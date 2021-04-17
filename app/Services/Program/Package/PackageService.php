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
        try {
            $titles = $data['title'];
            $d['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;;
            foreach ($titles as $title) {
                $d['title'] = $title;
                $this->package->create($d);
            }
            return true;
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($slug, $data)
    {
        try {
            $package = $this->findByColumn('slug', $slug);
            $data['title'] = $data['title'][0];
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $package->update($data);
        } catch (\Exception $ex) {
            return false;
        }
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
