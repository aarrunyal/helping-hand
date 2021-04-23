<?php

namespace App\Models\Program;

use App\Models\Category\Category;
use App\Models\Destination\Destination;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $uploadPath = "/uploads/program";

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'destination_ids',
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'cost',
        'dates',
        'group_discount_available',
        'group_discount_description',
        'has_sample_itinerary',
        'sample_itinerary_description',
        'is_active',
        'is_featured',
    ];

    protected $appends = ["image_path", "destination_title"];

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return [
                "thumb" => asset($this->uploadPath . "/thumb/" . $this->image),
                "real" => asset($this->uploadPath . "/" . $this->image),
            ];
        }
    }

    public function getDestinationTitleAttribute()
    {
        $data = [];
        if (!empty($this->destination_ids)) {
            $ids = explode(",", $this->destination_ids);
            $data = Destination::whereIn('id', $ids)->pluck('title')->all();
        }
        return $data;
    }

    public function category(){
        return $this->belongsTo(Category::class, "category_id");
    }
}
