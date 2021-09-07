<?php

namespace App\Services\Course;

use App\Models\Course\Course;

class CourseService
{

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function paginate($limit)
    {
        $departments = $this->course->orderBy('id', 'DESC')->paginate($limit);
        return $departments;
    }

    public function findByColumn($column, $value)
    {
        $departments = $this->course->where($column, $value)->first();
        return $departments;
    }

    public function store($data)
    {
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->course->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $course = $this->findByColumn('id', $id);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $course->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $course = $this->findByColumn('id', $id);
            return $course->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false)
    {
        $response = $this->course->where(function ($qry) use ($data) {
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
