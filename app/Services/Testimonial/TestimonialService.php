<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Testimonial;

use App\Models\Testimonial\Testimonial;
use App\Services\Service;

class TestimonialService extends Service
{
    protected $uploadPath = "uploads/testimonial";
    protected $testimonial;

    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    public function paginate($limit)
    {
        $testimonials = $this->testimonial->orderBy('id', 'DESC')->paginate($limit);
        return $testimonials;
    }


    public function findByColumn($column, $value)
    {
        $testimonials = $this->testimonial->where($column, $value)->first();
        return $testimonials;
    }

    public function store($data)
    {
//        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;;
            return $this->testimonial->create($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function update($id, $data)
    {
//        try {
            $testimonial = $this->findByColumn('id', $id);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $testimonial->update($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function delete($slug)
    {
        try {
            $testimonial = $this->findByColumn('slug', $slug);
            return $testimonial->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false, $limit = null)
    {
        $response = $this->testimonial->where(function ($qry) use ($data) {
            if (sizeof($data) > 0) {
                foreach ($data as $k => $d) {
                    $qry->where($k, $data[$k]);
                }
            }
        });
        if ($all) {
            if (!empty($limit))
                $response = $response->take($limit);
            return $response->get();
        }
        return $response->first();
    }
}
