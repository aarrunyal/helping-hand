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
use App\Models\Program\Package\PackageFaq;
use App\Models\Program\Package\PackageItinerary;
use App\Models\Program\Package\PackagePricing;
use App\Services\Service;
use PhpParser\Node\Stmt\DeclareDeclare;

class PackageItineraryService extends Service
{
    protected $uploadPath = "uploads/jtinerary";
    protected $itinerary;
    protected $package;

    public function __construct(
        PackageService $package,
        PackageItinerary $itinerary)
    {
        $this->package = $package;
        $this->itinerary = $itinerary;
    }

    public function paginate($limit)
    {
        $itinerarys = $this->itinerary->orderBy('id', 'DESC')->paginate($limit);
        return $itinerarys;
    }


    public function findByColumn($column, $value)
    {
        $itinerarys = $this->itinerary->where($column, $value)->first();
        return $itinerarys;
    }

    public function delete($slug)
    {
        try {
            $itinerary = $this->findByColumn('slug', $slug);
            return $itinerary->delete();
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
        $size = sizeof($data['title']);
        $value = [];
        for ($i = 0; $i < $size; $i++) {
//            if ($i < $size) {
            $temp = [
                'id' => isset($data['id']) && isset($data['id'][$i]) ? $data['id'][$i] : null,
                'title' => $data['title'][$i],
                'description' => $data['description'][$i],
                'is_active' => isset($data['is_active'])  && isset($data['is_active'][$i])? $data['is_active'][$i] : null,
            ];
            array_push($value, $temp);
        }
        foreach ($value as $i => $d) {
            $d['is_active'] = (isset($d['is_active']) && $d['is_active'] == "on") ? 1 : 0;;
            if (isset($d['id']) && !empty($d['id'])) {
                $itinerary = $this->itinerary->find($d['id']);
                $ids[] = $itinerary->id;
                $itinerary->update($d);
            } else {
                $d['package_id'] = $package->id;
                $itinerary = $this->itinerary->create($d);
                $ids[] = $itinerary->id;
            }
        }
        if (sizeof($ids) > 0) {
            $this->itinerary->whereNotIn('id', $ids)->delete();
        }
        return true;
    }
}
