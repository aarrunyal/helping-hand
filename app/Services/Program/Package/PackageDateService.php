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
use App\Models\Program\Package\PackageDates;
use App\Models\Program\Package\PackagePricing;
use App\Services\Service;
use PhpParser\Node\Stmt\DeclareDeclare;

class PackageDateService extends Service
{
    protected $uploadPath = "uploads/date";
    protected $date;
    protected $package;

    public function __construct(
        PackageService $package,
        PackageDates $date)
    {
        $this->package = $package;
        $this->date = $date;
    }

    public function paginate($limit)
    {
        $dates = $this->date->orderBy('id', 'DESC')->paginate($limit);
        return $dates;
    }


    public function findByColumn($column, $value)
    {
        $dates = $this->date->where($column, $value)->first();
        return $dates;
    }

    public function delete($slug)
    {
        try {
            $date = $this->findByColumn('slug', $slug);
            return $date->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    function storeAndUpdate($packageSlug, $data)
    {
        $package = $this->package->findByColumn('slug', $packageSlug);
        $ids = [];
        $temp = [];
        unset($data['_token']);
        $size = sizeof($data['start_from']);
        $value = [];
      for($i=0; $i<$size; $i++){
//            if ($i < $size) {
                $temp = [
                    'start_from' => formatDate($data['start_from'][$i]),
                    'end_to' => formatDate($data['end_to'][$i]),
                    'id' => isset($data['id']) && isset($data['id'][$i]) ? $data['id'][$i] : null,
                    'is_active' => isset($data['is_active'])  && isset($data['is_active'][$i])? $data['is_active'][$i] : null,
                ];

            array_push($value, $temp);
        }
        foreach ($value as $i => $d) {
            $d['is_active'] = (isset($d['is_active']) && $d['is_active'] == "on") ? 1 : 0;;
            if (isset($d['id']) && !empty($d['id'])) {
                $date = $this->date->find($d['id']);
                $ids[] = $date->id;
                $date->update($d);
            } else {
                $d['package_id'] = $package->id;
                $date = $this->date->create($d);
                $ids[] = $date->id;
            }
        }
        if (sizeof($ids) > 0) {
            $this->date->whereNotIn('id', $ids)->delete();
        }
        return true;
    }
}
