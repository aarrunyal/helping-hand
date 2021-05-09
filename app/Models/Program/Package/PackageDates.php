<?php

namespace App\Models\Program\Package;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageDates extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'package_id', 'start_from', 'end_to', 'is_active',
    ];

    protected $appends = [
        "start_end", 'start_from_text'
    ];

    public function getStartEndAttribute()
    {
        $start = date('Y M d', strtotime($this->start_from));
        $end = date('Y M d', strtotime($this->end_to));
        return $start . " - " . $end;
    }

    public function getStartFromTextAttribute()
    {
        $start = date('Y M d', strtotime($this->start_from));
        return $start;
    }

}
