<?php
/**
 * Created by PhpStorm.
 * User: aarrunyal
 * Date: 5/5/20
 * Time: 10:53 PM
 */

namespace App\Services\SystemUser;

use App\Models\SystemUser\SystemUser;
use App\Models\User\User;

class SystemUserService
{

    protected $user;

    public function __construct(SystemUser $user)
    {
        $this->user = $user;
    }

    public function paginate($limit)
    {
        $users = $this->user->orderBy('id', 'DESC')->paginate($limit);
        return $users;
    }

    public function findByColumn($column, $value)
    {
        $users = $this->user->where($column, $value)->first();
        return $users;
    }

    public function store($data)
    {
       try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            $data['password'] = isset($data['password']) && !empty($data['password'])? bcrypt($data['password']):null;
            return $this->user->create($data);
       } catch (\Exception $ex) {
           return false;
       }
    }

    public function update($id, $data)
    {
       try {
            $user = $this->findByColumn('id', $id);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $user->update($data);
       } catch (\Exception $ex) {
           return false;
       }
    }

    public function delete($id)
    {
        try {
            $user = $this->findByColumn('id', $id);
            return $user->delete();
        } catch (\Exception $ex) {
            return false;
        }
    }
    public function findByColumns($data, $all = false)
    {
        $response = $this->user->where(function ($qry) use ($data) {
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

    public function getTeacher()
    {
        return $this->user->whereUserType('teacher')->get();
    }

    public function getStaff()
    {
        return $this->user->whereUserType('staff')->get();
    }

    public function getStudent()
    {
        return $this->user->whereUserType('student')->get();
    }

    public function getParentCategory()
    {
        return $this->user->whereIsActive(1)->whereIsParent(1)->whereNull('parent_id')->get();
    }
}
