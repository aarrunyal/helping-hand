<?php

namespace App\Models\DocumentFile;

use App\Models\Document\Document;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    use HasFactory;

    protected $uploadPath = "/uploads/document-file";

    protected $fillable = ['document_id', 'file_path', 'name', 'type'];

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

