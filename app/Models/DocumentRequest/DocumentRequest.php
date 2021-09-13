<?php

namespace App\Models\DocumentRequest;

use App\Models\SystemUser\SystemUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'user_id'];

    public function user()
    {
        return $this->belongsTo(SystemUser::class, 'user_id');
    }
}
