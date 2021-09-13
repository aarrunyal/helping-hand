<?php

namespace App\Models\Announcement;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory, Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = ['title', 'slug', 'description', 'notice_for', 'start_date', 'end_date', 'is_active'];

    public function getFormatStartDateAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d', $this->start_date);
        return $date->format('Y'). " ". $date->format('F'). " ". $date->format('d');
    }
    public function getFormatEndDateAttribute()
    {
        $date = Carbon::createFromFormat('Y-m-d', $this->end_date);
        return $date->format('Y'). " ". $date->format('F'). " ". $date->format('d');
    }
}
