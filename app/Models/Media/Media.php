<?php

namespace App\Models\Media;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use HasFactory, SoftDeletes;
    protected $uploadPath = "uploads/media";

    protected $fillable=[
        'path',
        'title',
        'type',
        'size',
        'is_downloadable',
        'is_featured',
        'uploaded_by',
        'is_active',

    ];

    protected $appends = [
        "image_path"
    ];

    public function getImagePathAttribute()
    {
        $imagePath = [];
        if (!empty($this->path)) {
            $imagePath = [
                "real" => asset($this->uploadPath  . "/" . $this->path),
                "thumb" => asset($this->uploadPath ."/thumb/" . $this->path),
            ];
        }
        return $imagePath;
    }
}
