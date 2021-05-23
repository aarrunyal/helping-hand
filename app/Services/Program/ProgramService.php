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
        $data['is_featured'] = (isset($data['is_featured']) && $data['is_featured'] == "on") ? 1 : 0;
        if (isset($data['image'])) {
            $data['image'] = $this->upload($data['image'], null, null, $this->uploadPath);
        }
        $data['destination_ids'] = (isset($data['destination_ids']) && sizeof($data["destination_ids"]) > 0) ? implode(',', $data["destination_ids"]) : null;
        return $this->program->create($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function update($slug, $data)
    {
//        try {
        $program = $this->findByColumn('slug', $slug);
        $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
        $data['is_featured'] = (isset($data['is_featured']) && $data['is_featured'] == "on") ? 1 : 0;
        $data['has_sample_itinerary'] = (isset($data['has_sample_itinerary']) && $data['has_sample_itinerary'] == "on") ? 1 : 0;
        $data['group_discount_available'] = (isset($data['group_discount_available']) && $data['group_discount_available'] == "on") ? 1 : 0;
        $data['destination_ids'] = (isset($data['destination_ids']) && sizeof($data["destination_ids"]) > 0) ? implode(',', $data["destination_ids"]) : null;
        if (isset($data['image'])) {
            if (!empty($program->image)) {
                $this->deleteUploadedImage($program->image, $this->uploadPath);
            }
            $data['image'] = $this->upload($data['image'], null, null, $this->uploadPath);
        }
        return $program->update($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
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

    public function findByColumns($data, $all = false, $limit = null)
    {
        $response = $this->program->where(function ($qry) use ($data) {
            if (sizeof($data) > 0) {
                foreach ($data as $k => $d) {
                    $qry->where($k, $data[$k]);
                }
            }
        });
        if ($all)
            return $response->take($limit)->get();
        return $response->first();
    }

    public function findByWhereIn($column, $value, $data = [], $all = false, $limit = null)
    {
        $response = $this->program->whereIn($column, $value)->where(function ($qry) use ($data) {
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

    public function getOtherProgram($program)
    {
        $programs = $this->program->where('id', "!=", $program->id)->where(function ($qry) {
            if (!empty($program->category_id))
                $qry->whereCategoryId($program->category_id);
        })->take(10)->get();
        return $programs;
    }

    public function findAllByDestinationId($destinationId)
    {
        return $this->program->whereRaw('FIND_IN_SET(?,destination_ids)', [$destinationId])->whereIsActive(1)->get();
    }
    public function totalApplications(){
        return $this->program->count();
    }
}
