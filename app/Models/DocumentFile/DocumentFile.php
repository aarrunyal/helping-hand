<?php

namespace App\Models\DocumentFile;

use App\Models\Document\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentFile extends Model
{
    use HasFactory, SoftDeletes;

    protected $uploadPath = "/uploads/document-file";

    protected $fillable = ['document_id', 'file_path', 'name', 'type', 'upload_by', 'deleted_by'];

    protected $appends = ["file"];

    public function getFileAttribute()
    {
        if ($this->file_path) {
            return asset($this->uploadPath .'/' . $this->file_path);
        }
    }

    public function documents()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}

