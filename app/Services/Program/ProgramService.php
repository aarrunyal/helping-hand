<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\Program;


use App\Models\Program\Program;
use App\Services\Service;

class ProgramService extends Service
{
    protected $program;
    protected $uploadPath = "uploads/program";

    public function __construct(Program $program)
    {
        $this->program = $program;
    }

    public function paginate($limit)
    {
        $programs = $this->program->orderBy('id', 'DESC')->paginate($limit);
        return $programs;
    }

    public function findByColumn($column, $value)
    {
        $programs = $this->program->where($column, $value)->first();
        return $programs;
    }

    public function store($data)
    {
//        try {
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        $data['has_sample_itinerary'] = (isset($data['has_sample_itinerary']) && $data['has_sample_itinerary'] == "on") ? 1 : 0;
        $data['group_discount_available'] = (isset($data['group_discount_available']) && $data['group_discount_available'] == "on") ? 1 : 0;
        if (isset($data['image'])) {
            $data['image'] = $this->upload($data['image'], null, null, $this->uploadPath);
        }
        return $this->program->create($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function update($slug, $data)
    {
        try {
            $program = $this->findByColumn('slug', $slug);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            $data['has_sample_itinerary'] = (isset($data['has_sample_itinerary']) && $data['has_sample_itinerary'] == "on") ? 1 : 0;
            $data['group_discount_available'] = (isset($data['group_discount_available']) && $data['group_discount_available'] == "on") ? 1 : 0;
            if (isset($data['image'])) {
                if (!empty($program->image)) {
                    $this->deleteUploadedImage($program->image, $this->uploadPath);
                }
                $data['image'] = $this->upload($data['image'], null, null, $this->uploadPath);
            }
            return $program->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($slug)
    {
        try {
            $program = $this->findByColumn('slug', $slug);
            if (!empty($program->image)) {
                $this->deleteUploadedImage($program->image, $this->uploadPath);
            }
            return $program->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false)
    {
        $response = $this->program->where(function ($qry) use ($data) {
            if (sizeof($data) > 0) {
                foreach ($data as $k => $d) {
                    $qry->where($k, $data[$k]);
                }
            }
        });
        if ($all)
            return $response->get();
        return $response->first();
    }
}
