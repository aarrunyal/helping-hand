<?php

namespace App\Models\Department;

use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'course_id',
        'description',
        'is_active',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
