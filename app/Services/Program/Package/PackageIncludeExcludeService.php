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
use App\Models\Program\Package\PackageIncludeExclude;
use App\Models\Program\Package\PackagePricing;
use App\Services\Service;
use PhpParser\Node\Stmt\DeclareDeclare;

class PackageIncludeExcludeService extends Service
{
    protected $uploadPath = "uploads/includeExclude";
    protected $includeExclude;
    protected $package;

    public function __construct(
        PackageService $package,
        PackageIncludeExclude $includeExclude)
    {
        $this->package = $package;
        $this->includeExclude = $includeExclude;
    }

    public function paginate($limit)
    {
        $includeExcludes = $this->includeExclude->orderBy('id', 'DESC')->paginate($limit);
        return $includeExcludes;
    }


    public function findByColumn($column, $value)
    {
        $includeExcludes = $this->includeExclude->where($column, $value)->first();
        return $includeExcludes;
    }

    public function delete($slug)
    {
        try {
            $includeExclude = $this->findByColumn('slug', $slug);
            return $includeExclude->delete();
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
                'title' => $data['title'][$i],
                'description' => $data['description'][$i],
                'type' => $data['type'][$i],
                'id' => isset($data['id']) && isset($data['id'][$i]) ? $data['id'][$i] : null,
                'is_active' => isset($data['is_active']) && isset($data['is_active'][$i]) ? $data['is_active'][$i] : null,
            ];

            array_push($value, $temp);
        }
        foreach ($value as $i => $d) {
            $d['is_active'] = (isset($d['is_active']) && $d['is_active'] == "on") ? 1 : 0;;
            if (isset($d['id']) && !empty($d['id'])) {
                $includeExclude = $this->includeExclude->find($d['id']);
                $ids[] = $includeExclude->id;
                $includeExclude->update($d);
            } else {
                $d['package_id'] = $package->id;
                $includeExclude = $this->includeExclude->create($d);
                $ids[] = $includeExclude->id;
            }
        }
        if (sizeof($ids) > 0) {
            $this->includeExclude->whereNotIn('id', $ids)->delete();
        }
        return true;
    }
}
