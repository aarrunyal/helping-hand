<?php

namespace App\Models\Program\Package;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackagePricing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'package_id', 'period', 'unit', 'price', 'is_active',
    ];

    protected $appends = ['duration'];

    public function getDurationAttribute()
    {
        return $this->period . " " . $this->unit . "- $" . $this->price;
    }
}
