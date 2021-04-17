<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Program\Package;


use App\Models\Destination\Destination;
use App\Models\Page\Page;
use App\Models\Program\Package\Package;
use App\Services\Service;

class PackageService extends Service
{
    protected $uploadPath = "uploads/package";
    protected $package;

    public function __construct(Package $package)
    {
        $this->package = $package;
    }

    public function paginate($limit)
    {
        $packages = $this->package->orderBy('id', 'DESC')->paginate($limit);
        return $packages;
    }


    public function findByColumn($column, $value)
    {
        $packages = $this->package->where($column, $value)->first();
        return $packages;
    }

    public function store($data)
    {
//        try {
        $titles = $data['title'];
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;;
        $data['dates_available'] = (isset($data['dates_available']) && $data['dates_available'] == "on") ? 1 : 0;;
        $data['is_free'] = (isset($data['is_free']) && $data['is_free'] == "on") ? 1 : 0;
        if (isset($data['image'])) {
            $data['image'] = $this->upload($data['image'], null, null, $this->uploadPath);
        }
        $this->package->create($data);
        return true;
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function update($slug, $data)
    {
//        try {
            $package = $this->findByColumn('slug', $slug);
            $data['title'] = $data['title'][0];
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;;
        $data['dates_available'] = (isset($data['dates_available']) && $data['dates_available'] == "on") ? 1 : 0;;
        $data['is_free'] = (isset($data['is_free']) && $data['is_free'] == "on") ? 1 : 0;
            if (isset($data['image'])) {
                if (!empty($package->image)) {
                    $this->deleteUploadedImage($package->image, $this->uploadPath);
                }
                $data['image'] = $this->upload($data['image'], null, null, $this->uploadPath);
            }
            return $package->update($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function delete($slug)
    {
        try {
            $package = $this->findByColumn('slug', $slug);
            return $package->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }
}
