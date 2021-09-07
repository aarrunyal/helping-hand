<?php

namespace App\Services\Department;

use App\Models\Department\Department;

class DepartmentService
{

    public function __construct(Department $department)
    {
        $this->department = $department;
    }

    public function paginate($limit)
    {
        $departments = $this->department->orderBy('id', 'DESC')->paginate($limit);
        return $departments;
    }

    public function findByColumn($column, $value)
    {
        $departments = $this->department->where($column, $value)->first();
        return $departments;
    }

    public function store($data)
    {
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->department->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            $department = $this->findByColumn('id', $id);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $department->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            $department = $this->findByColumn('id', $id);
            return $department->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false)
    {
        $response = $this->department->where(function ($qry) use ($data) {
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
