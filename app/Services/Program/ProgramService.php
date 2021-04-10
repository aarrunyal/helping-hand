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
        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->program->create($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function update($slug, $data)
    {
        try {
            $program = $this->findByColumn('slug', $slug);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $program->update($data);
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function delete($slug)
    {
        try {
            $program = $this->findByColumn('slug', $slug);
            return $program->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }
}
