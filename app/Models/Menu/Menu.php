<?php

namespace App\Models\Menu;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'parent_id',
        'reference_id',
        'title',
        'placing',
        'slug',
        'link',
        'type',
        'position',
        'is_parent',
        'is_active',
    ];

    public function parent(){
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(Menu::class, 'parent_id')->whereIsParent(0);
    }
}
