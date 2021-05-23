<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Page;


use App\Models\Page\Page;
use App\Services\Service;

class PageService extends Service
{
    protected $uploadPath = "uploads/page";
    protected $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function paginate($limit)
    {
        $pages = $this->page->orderBy('id', 'DESC')->paginate($limit);
        return $pages;
    }


    public function findByColumn($column, $value)
    {
        $pages = $this->page->where($column, $value)->first();
        return $pages;
    }

    public function store($data)
    {
//        try {
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        $data['is_parent'] = (isset($data['is_parent']) && $data['is_parent'] == "on") ? 1 : 0;
        if (isset($data['social_share_image'])) {
            $data['social_share_image'] = $this->upload($data['social_share_image'], null, null, $this->uploadPath);
        }
        return $this->page->create($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function update($slug, $data)
    {
//        try {
        $page = $this->findByColumn('slug', $slug);
        if (isset($data['social_share_image'])) {
            if (!empty($page->social_share_image)) {
                $this->deleteUploadedImage($page->social_share_image, $this->uploadPath);
            }
            $data['social_share_image'] = $this->upload($data['social_share_image'], null, null, $this->uploadPath);
        }
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        $data['is_parent'] = (isset($data['is_parent']) && $data['is_parent'] == "on") ? 1 : 0;
        return $page->update($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function delete($slug)
    {
        try {
            $page = $this->findByColumn('slug', $slug);
            if (!empty($page->social_share_image)) {
                $this->deleteUploadedImage($page->social_share_image, $this->uploadPath);
            }
            return $page->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false, $limit = null)
    {
        $packages = $this->page->where(function ($qry) use ($data) {
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
}
