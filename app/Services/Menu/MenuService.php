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
        $menus = $this->menu->orderBy('id', 'DESC')->paginate($limit);
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
        $data['is_parent'] = (isset($data['is_parent']) && $data['is_parent'] == "on") ? 1 : 0;
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        if ($data['is_parent'] && $data['type'] != 'single')
            $data['link'] = $this->getLink($data['type'], $data['reference_id']);
        return $this->menu->create($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
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
        try {
            $menu = $this->findByColumn('slug', $slug);
            $data['is_parent'] = (isset($data['is_parent']) && $data['is_parent'] == "on") ? 1 : 0;
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            if ($data['is_parent'] && $data['type'] != 'single')
                $data['link'] = $this->getLink($data['type'], $data['reference_id']);
            return $menu->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($slug)
    {
        try {
            $menu = $this->findByColumn('slug', $slug);
            if (!empty($menu->social_share_image)) {
                $this->deleteUploadedImage($menu->social_share_image, $this->uploadPath);
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
