<?php

namespace App\Models\Document;

use App\Models\Category\Category;
use App\Models\Course\Course;
use App\Models\Department\Department;
use App\Models\DocumentFile\DocumentFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category_id', 'department_id', 'course_id', 'downloadable', 'access_type', 'created_by', 'is_active'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function document_files()
    {
        return $this->hasMany(DocumentFile::class, 'document_id');
    }
}
