<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Application;


use App\Models\Application\Application;
use App\Models\Page\Page;
use App\Services\Service;

class ApplicationService extends Service
{
    protected $uploadPath = "uploads/application";
    protected $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function paginate($limit)
    {
        $applications = $this->application->orderBy('id', 'DESC')->paginate($limit);
        return $applications;
    }

    function getParents()
    {
        $parentPages = $this->application->whereParentId(null)->whereIsParent(1)->get();
        return $parentPages;
    }

    public function findByColumn($column, $value)
    {
        $applications = $this->application->where($column, $value)->first();
        return $applications;
    }

    public function store($data)
    {
//        try {
            return $this->application->create($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function update($id, $data)
    {
//        try {
        $application = $this->findByColumn('id', $id);
        $data['is_read'] = (isset($data['is_read']) && $data['is_read'] == "on") ? 1 : 0;
        $data['is_served'] = (isset($data['is_served']) && $data['is_served'] == "on") ? 1 : 0;
        $data['is_email_forwarded'] = (isset($data['is_email_forwarded']) && $data['is_email_forwarded'] == "on") ? 1 : 0;
        return $application->update($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function delete($slug)
    {
        try {
            $application = $this->findByColumn('slug', $slug);
            if (!empty($application->social_share_image)) {
                $this->deleteUploadedImage($application->social_share_image, $this->uploadPath);
            }
            return $application->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false, $limit = 6)
    {
        $packages = $this->application->where(function ($qry) use ($data) {
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
