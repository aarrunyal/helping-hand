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
//        try {
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $this->user->create($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    public function update($id, $data)
    {
//        try {
            $user = $this->findByColumn('id', $id);
            $data['is_active'] = (isset($data['is_active']) && $data['is_active'] == "on") ? 1 : 0;
            return $user->update($data);
//        } catch (\Exception $ex) {
//            return false;
//        }
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

    public function getParentCategory()
    {
        return $this->user->whereIsActive(1)->whereIsParent(1)->whereNull('parent_id')->get();
    }
}