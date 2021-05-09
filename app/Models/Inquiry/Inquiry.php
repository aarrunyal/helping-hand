<?php

namespace App\Models\Inquiry;

use App\Models\Destination\Destination;
use App\Models\Program\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'destination_id',
        'program_id',
        'first_name',
        'last_name',
        'phone_no',
        'email',
        'address',
        'planed_for',
        'description',
        'is_read',
        'message_permitted',
        'is_email_forwarded',
        'is_served',

    ];

    protected $appends = ['planned_for_text', 'full_name'];

    public function getPlannedForTextAttribute()
    {
        return ucwords(str_replace('_', " ", $this->planned_for));
    }

    public function getFullNameAttribute()
    {
        return ucwords($this->first_name . " " . $this->last_name);
    }

    public function destination(){
        return $this->belongsTo(Destination::class, 'destination_id');
    }

    public function program(){
        return $this->belongsTo(Program::class, 'program_id');
    }
}
