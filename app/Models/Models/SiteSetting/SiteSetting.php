<?php

namespace App\Models\Models\SiteSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type', 'value', 'is_active'];
}
