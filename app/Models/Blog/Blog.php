<?php

namespace App\Models\Blog;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes, Sluggable;

    protected $uploadPath = "uploads/blog";

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
        'type',
        'tags',
        'content',
        'seo_title',
        'seo_description',
        'social_share_image',
        'social_share_description',
        'category_id',
        'views',
        'is_active',
        'is_active',
        'is_featured',
    ];

    protected $appends = [
        "image_path"
    ];

    public function getImagePathAttribute()
    {
        $path = [];
        if (!empty($this->social_share_image)) {
            $path = [
                "thumb" => asset($this->uploadPath . "/thumb/" . $this->social_share_image),
                "real" =>asset( $this->uploadPath . "/" . $this->social_share_image),
            ];
        }
        return $path;
    }
}
