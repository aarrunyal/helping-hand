<?php

namespace App\Models\Page;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes, Sluggable;

    protected $uploadPath = "uploads/page";

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
        'name',
        'slug',
        'title',
        'placing',
        'seo_title',
        'seo_key_words',
        'seo_description',
        'social_share_image',
        'position',
        'description',
        'is_parent',
        'is_active',

    ];

    protected $appends = [
        "image_path", 'parent_name'
    ];

    public function getImagePathAttribute()
    {
        $path = [];
        if (!empty($this->social_share_image)) {
            $path = [
                "thumb" => $this->uploadPath . "/thumb/" . $this->social_share_image,
                "real" => $this->uploadPath . "/" . $this->social_share_image,
            ];
        }
        return $path;
    }

    public function parent()
    {
        return $this->belongsTo(Page::class, "parent_id");
    }

    public function getParentNameAttribute()
    {
        if (!empty($this->parent))
            return $this->parent->title;
        return null;
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
}
