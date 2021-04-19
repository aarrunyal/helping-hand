<?php

namespace App\Models\Testimonial;

use App\Models\Destination\Destination;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "destination_id",
        "description",
        "from",
        "is_active",
    ];

    protected function destination(){
        return $this->belongsTo(Destination::class,"destination_id");
    }
}
