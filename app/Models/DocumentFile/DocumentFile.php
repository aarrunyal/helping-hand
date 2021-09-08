<?php

namespace App\Models\DocumentFile;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentFile extends Model
{
    use HasFactory;

    protected $fillable = ['document_id', 'file_path', 'type'];
}

