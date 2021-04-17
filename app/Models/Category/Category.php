<?php

namespace App\Models\Category;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'slug',
        'is_parent',
        'parent_id',
        'is_active',
        'is_requested',
    ];

    protected $appends = [];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
