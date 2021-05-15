<?php


namespace App\Services\Menu;

use App\Models\Inquiry\Inquiry;
use App\Models\Media\Media;
use App\Models\Menu\Menu;
use App\Services\Blog\BlogService;
use App\Services\Page\PageService;
use App\Services\Program\Package\PackageService;
use App\Services\Program\ProgramService;
use App\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuService extends Service
{
    protected $uploadPath = "uploads/menu";
    protected $menu;
    protected $blog;
    protected $page;
    protected $package;
    protected $program;

    public function __construct(
        Menu $menu,
        BlogService $blogService,
        PageService $pageService,
        PackageService $packageService,
        ProgramService $programService)
    {
        $this->menu = $menu;
        $this->blog = $blogService;
        $this->page = $pageService;
        $this->package = $packageService;
        $this->program = $programService;
    }

    public function paginate($limit)
    {
        $menus = $this->menu->whereIsParent(1)->orderBy('id', 'DESC')->paginate($limit);
        return $menus;
    }

    function getParents()
    {
        $parentPages = $this->menu->whereParentId(null)->whereIsParent(1)->get();
        return $parentPages;
    }

    public function findByColumn($column, $value)
    {
        $menus = $this->menu->where($column, $value)->first();
        return $menus;
    }

    public function store($data)
    {
//        try {
        $children = [];
        $data['is_parent'] = (isset($data['is_parent']) && $data['is_parent'] == "on") ? 1 : 0;
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        if ($data['is_parent'] && $data['type'] != 'single')
            $data['link'] = $this->getLink($data['type'], $data['reference_id']);
        if (isset($data['child_reference_id']) && sizeof($data['child_reference_id']) > 0) {
            $children = $this->buildChildren($data);
            unset($data['child_reference_id']);
            unset($data['child_title']);
        }
        $data['is_parent'] = 1;
        $menu = $this->menu->create($data);
        if ($menu && sizeof($children) > 0) {
            $this->createAndUpdateChildren($menu->id, $children);
        }
        return $menu;
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    function createAndUpdateChildren($menuId, $children)
    {
        $childMenuIdArray = [];
        foreach ($children as $child) {
            $child['parent_id'] = $menuId;
            if (empty($child['id'])) {
                $m = $this->menu->create($child);
                $childMenuIdArray[] = $m->id;
            } else {
                $menu = $this->findByColumn('id', $child['id']);
                $menu->update($child);
                $childMenuIdArray[] = $child['id'];
            }
        }

        if (sizeof($childMenuIdArray) > 0) {
            $this->menu->whereParentId($menuId)->whereNotIn('id', $childMenuIdArray)->delete();
        }
        return true;
    }

    function buildChildren($data)
    {
        $children = [];
        for ($i = 0; $i < sizeof($data['child_reference_id']); $i++) {
            $children[] = [
                'id' => (isset($data['child_id'][$i]) && !empty($data['child_id'][$i])) ? $data['child_id'][$i] : null,
                'type' => $data['type'],
                'title' => $data['child_title'][$i],
                'link' => !empty($data['child_reference_id'][$i])?$this->getLink($data['type'], $data['child_reference_id'][$i]):null,
                'reference_id' => $data['child_reference_id'][$i],
                'is_parent' => 0,
                'is_active' => (isset($data['is_active']) && $data['is_active'] == 1) ? 1 : 0,
            ];
        }
        return $children;
    }

    function getLink($type, $referenceId)
    {
        $link = null;
        if ($type == 'page') {
            $response = $this->page->findByColumn('id', $referenceId);
            $link = route('page', $response->slug);
        }
        if ($type == 'blog') {
            $response = $this->blog->findByColumn('id', $referenceId);
            $link = route('blog-detail', $response->slug);
        }
        if ($type == 'package') {
            $response = $this->package->findByColumn('id', $referenceId);
            $link = route('package-details', $response->slug);
        }
        if ($type == 'program') {
            $response = $this->program->findByColumn('id', $referenceId);
            $link = route('program-details', $response->slug);
        }
        return $link;
    }

    public function update($slug, $data)
    {
//        try {
        $children = [];
        $menu = $this->findByColumn('slug', $slug);
        $menuId = $menu->id;
        $data['is_parent'] = 1;
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        if ($data['is_parent'] && $data['type'] != 'single' && isset($data['reference_id']))
            $data['link'] = $this->getLink($data['type'], $data['reference_id']);
        if (isset($data['child_reference_id']) && sizeof($data['child_reference_id']) > 0) {
            $children = $this->buildChildren($data);
            unset($data['child_reference_id']);
            unset($data['child_title']);
        }
//        dd($children);
        if ($menu->update($data) && sizeof($children) > 0) {
            $this->createAndUpdateChildren($menuId, $children);
        }

        return true;
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function delete($slug)
    {
        try {
            $menu = $this->findByColumn('slug', $slug);
            if ($menu->children->count() > 0) {
                foreach ($menu->children as $child) {
                    $child->delete();
                }
            }
            return $menu->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false, $limit = 6)
    {
        $packages = $this->menu->where(function ($qry) use ($data) {
            if (sizeof($data) > 0) {
                foreach ($data as $k => $d) {
                    $qry->where($k, $data[$k]);
                }
            }
        });
        if ($all) {
            if (!empty($limit))
                $packages = $packages->take($limit);
            $packages = $packages->orderBy('position', "DESC")->get();
        } else
            $packages = $packages->first();
        return $packages;
    }

    public function getValues($type)
    {
        $response = null;
        if ($type == 'page')
            $response = $this->page->findByColumns(['is_active' => 1], true);
        if ($type == 'blog')
            $response = $this->blog->findByColumns(['is_active' => 1], true);
        if ($type == 'package')
            $response = $this->package->findByColumns(['is_active' => 1], true);
        if ($type == 'program')
            $response = $this->program->findByColumns(['is_active' => 1], true);
        return $response;
    }
}
