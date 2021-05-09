<?php

namespace App\Models\Models\SiteSetting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $uploadPath = "uploads/site-setting";

    protected $fillable = ['title', 'type', 'value', 'is_active'];

    protected $appends = [
        'image_path'
    ];

    public function getImagePathAttribute()
    {
        $imagePath = [];
        if (!empty($this->value) && $this->type == "file") {
            $imagePath = [
                "real" => asset($this->uploadPath . "/" . $this->value),
                "thumb" => asset($this->uploadPath . "/thumb/" . $this->value),
            ];
        }
        return $imagePath;
    }
}
