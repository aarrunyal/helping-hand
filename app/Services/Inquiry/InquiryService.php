<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Inquiry;


use App\Models\Application\Application;
use App\Models\Inquiry\Inquiry;
use App\Models\Page\Page;
use App\Services\Service;

class InquiryService extends Service
{
    protected $uploadPath = "uploads/inquiry";
    protected $inquiry;

    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    public function paginate($limit)
    {
        $inquirys = $this->inquiry->orderBy('id', 'DESC')->paginate($limit);
        return $inquirys;
    }

    function getParents()
    {
        $parentPages = $this->inquiry->whereParentId(null)->whereIsParent(1)->get();
        return $parentPages;
    }

    public function findByColumn($column, $value)
    {
        $inquirys = $this->inquiry->where($column, $value)->first();
        return $inquirys;
    }

    public function store($data)
    {
//        try {
        return $this->inquiry->create($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function update($slug, $data)
    {
//        try {
        $inquiry = $this->findByColumn('slug', $slug);
        if (isset($data['social_share_image'])) {
            if (!empty($inquiry->social_share_image)) {
                $this->deleteUploadedImage($inquiry->social_share_image, $this->uploadPath);
            }
            $data['social_share_image'] = $this->upload($data['social_share_image'], null, null, $this->uploadPath);
        }
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        $data['is_parent'] = (isset($data['is_parent']) && $data['is_parent'] == "on") ? 1 : 0;
        return $inquiry->update($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function delete($slug)
    {
        try {
            $inquiry = $this->findByColumn('slug', $slug);
            if (!empty($inquiry->social_share_image)) {
                $this->deleteUploadedImage($inquiry->social_share_image, $this->uploadPath);
            }
            return $inquiry->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false, $limit = 6)
    {
        $packages = $this->inquiry->where(function ($qry) use ($data) {
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
