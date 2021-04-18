<?php

namespace App\Models\Program\Package;

use App\Models\Destination\Destination;
use App\Models\Program\Program;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $uploadPath = "uploads/package";

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'program_id',
        'destination_id',
        'title',
        'slug',
        'image',
        'short_description',
        'description',
        'is_free',
        'cost_description',
        'dates_available',
        'dates_description',
        'more_info',
        'seo_title',
        'seo_description',
        'is_active',
        'is_featured',
    ];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return [
                "thumb" => asset($this->uploadPath . "/thumb/" . $this->image),
                "real" => asset($this->uploadPath . "/" . $this->image),
            ];
        }
    }

    protected function program()
    {
        return $this->belongsTo(Program::class, "program_id");
    }

    protected function destination()
    {
        return $this->belongsTo(Destination::class, "destination_id");
    }

    protected function pricings()
    {
        return $this->hasMany(PackagePricing::class, 'package_id');
    }

    protected function dates()
    {
        return $this->hasMany(PackageDates::class, 'package_id');
    }

    protected function itineraries()
    {
        return $this->hasMany(PackageItinerary::class, 'package_id');
    }

    protected function faqs()
    {
        return $this->hasMany(PackageFaq::class, 'package_id');
    }
}
