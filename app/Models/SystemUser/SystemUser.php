<?php

namespace App\Models\SystemUser;

use App\Models\Department\Department;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class SystemUser extends Authenticatable
{
    protected $fillable = [
        'first_name',
        'last_name',
        'user_name',
        'email',
        'phone',
        'password',
        'last_login_time',
        'department_id',
        'user_type',
        'is_active',
        'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
