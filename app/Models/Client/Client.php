<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $uploadPath = "uploads/client";
    protected $fillable = [
        'title', 'image', 'is_active'
    ];

    protected $appends = [
        "image_path"
    ];

    public function getImagePathAttribute()
    {
        $path = [];
        if (!empty($this->image)) {
            $path = [
                "thumb" => asset($this->uploadPath . "/thumb/" . $this->image),
                "real" => asset($this->uploadPath . "/" . $this->image),
            ];
        }
        return $path;
    }
}
