<?php

namespace App\Models\SystemUser;
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
        'is_active',
        'remember_token',
    ];
}
