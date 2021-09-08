<?php

namespace App\Models\Document;

use App\Models\Course\Course;
use App\Models\DocumentFile\DocumentFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['document_file_id','title', 'description', 'course_id', 'downloadable', 'viewable', 'access_type', 'is_active'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
}
