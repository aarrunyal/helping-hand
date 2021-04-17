<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\SiteSetting;


use App\Models\Models\SiteSetting\SiteSetting;
use App\Services\Service;

class SiteSettingService extends Service
{
    protected $uploadPath = "uploads/siteSetting";
    protected $siteSetting;

    public function __construct(SiteSetting $siteSetting)
    {
        $this->siteSetting = $siteSetting;
    }

    public function paginate($limit)
    {
        $siteSettings = $this->siteSetting->orderBy('id', 'DESC')->paginate($limit);
        return $siteSettings;
    }

    public function findByColumn($column, $value)
    {
        $siteSettings = $this->siteSetting->where($column, $value)->first();
        return $siteSettings;
    }

    public function store($data)
    {
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->siteSetting->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $siteSetting = $this->findByColumn('id', $id);

            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $siteSetting->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $siteSetting = $this->findByColumn('id', $id);
            return $siteSetting->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }
}
