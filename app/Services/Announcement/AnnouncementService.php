<?php

namespace App\Services\Announcement;

use App\Models\Announcement\Announcement;

class AnnouncementService
{
    protected $announcement;

    public function __construct(Announcement $announcement)
    {
        $this->announcement = $announcement;
    }

    public function paginate($limit)
    {
        $departments = $this->announcement->orderBy('slug', 'DESC')->paginate($limit);
        return $departments;
    }

    public function findByColumn($column, $value)
    {
        $departments = $this->announcement->where($column, $value)->first();
        return $departments;
    }

    public function store($data)
    {
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->announcement->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($slug, $data)
    {
        try {
            $announcement = $this->findByColumn('slug', $slug);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $announcement->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($slug)
    {
        try {
            $announcement = $this->findByColumn('slug', $slug);
            return $announcement->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function findByColumns($data, $all = false)
    {
        $response = $this->announcement->where(function ($qry) use ($data) {
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

    public function getActive()
    {
        $response = $this->announcement->whereIsActive(1)->get();
        return $response;
    }
}

