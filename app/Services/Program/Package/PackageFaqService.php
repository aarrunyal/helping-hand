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
use App\Models\Program\Package\PackagePricing;
use App\Services\Service;
use PhpParser\Node\Stmt\DeclareDeclare;

class PackageFaqService extends Service
{
    protected $uploadPath = "uploads/faq";
    protected $faq;
    protected $package;

    public function __construct(
        PackageService $package,
        PackageFaq $faq)
    {
        $this->package = $package;
        $this->faq = $faq;
    }

    public function paginate($limit)
    {
        $faqs = $this->faq->orderBy('id', 'DESC')->paginate($limit);
        return $faqs;
    }


    public function findByColumn($column, $value)
    {
        $faqs = $this->faq->where($column, $value)->first();
        return $faqs;
    }

    public function delete($slug)
    {
        try {
            $faq = $this->findByColumn('slug', $slug);
            return $faq->delete();
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
                'id' => isset($data['id']) && isset($data['id'][$i]) ? $data['id'][$i] : null,
                'is_active' => isset($data['is_active']) && isset($data['is_active'][$i]) ? $data['is_active'][$i] : null,
            ];

            array_push($value, $temp);
        }
        foreach ($value as $i => $d) {
            $d['is_active'] = (isset($d['is_active']) && $d['is_active'] == "on") ? 1 : 0;;
            if (isset($d['id']) && !empty($d['id'])) {
                $faq = $this->faq->find($d['id']);
                $ids[] = $faq->id;
                $faq->update($d);
            } else {
                $d['package_id'] = $package->id;
                $faq = $this->faq->create($d);
                $ids[] = $faq->id;
            }
        }
        if (sizeof($ids) > 0) {
            $this->faq->whereNotIn('id', $ids)->delete();
        }
        return true;
    }
}
