<?php

namespace App\Models\Program\Package;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageFaq extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'package_id', 'title', 'description', 'is_active',
    ];
}
