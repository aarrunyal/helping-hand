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
use App\Models\Program\Package\PackagePricing;
use App\Services\Service;
use PhpParser\Node\Stmt\DeclareDeclare;

class PackagePricingService extends Service
{
    protected $uploadPath = "uploads/pricing";
    protected $pricing;
    protected $package;

    public function __construct(
        PackageService $package,
        PackagePricing $pricing)
    {
        $this->package = $package;
        $this->pricing = $pricing;
    }

    public function paginate($limit)
    {
        $pricings = $this->pricing->orderBy('id', 'DESC')->paginate($limit);
        return $pricings;
    }


    public function findByColumn($column, $value)
    {
        $pricings = $this->pricing->where($column, $value)->first();
        return $pricings;
    }

    public function delete($slug)
    {
        try {
            $pricing = $this->findByColumn('slug', $slug);
            return $pricing->delete();
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
        $size = sizeof($data['price']);
        $value = [];
      for($i=0; $i<$size; $i++){
//            if ($i < $size) {
                $temp = [
                    'price' => $data['price'][$i],
                    'period' => $data['period'][$i],
                    'unit' => $data['unit'][$i],
                    'id' => isset($data['id']) && isset($data['id'][$i]) ? $data['id'][$i] : null,
                    'is_active' => isset($data['is_active'])  && isset($data['is_active'][$i])? $data['is_active'][$i] : null,
                ];

            array_push($value, $temp);
        }

        foreach ($value as $i => $d) {
            $d['is_active'] = (isset($d['is_active']) && $d['is_active'] == "on") ? 1 : 0;;
            if (isset($d['id']) && !empty($d['id'])) {
                $pricing = $this->pricing->find($d['id']);
                $ids[] = $pricing->id;
                $pricing->update($d);
            } else {
                $d['package_id'] = $package->id;
                $pricing = $this->pricing->create($d);
                $ids[] = $pricing->id;
            }
        }
        if (sizeof($ids) > 0) {
            $this->pricing->whereNotIn('id', $ids)->delete();
        }
        return true;
    }
}
