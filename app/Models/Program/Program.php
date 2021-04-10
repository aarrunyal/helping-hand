<?php

namespace App\Models\Program;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
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
        'short_description',
        'description',
        'cost',
        'dates',
        'group_discount_available',
        'group_discount_description',
        'has_sample_itinerary',
        'sample_itinerary_description',
        'is_active',

    ];
}
