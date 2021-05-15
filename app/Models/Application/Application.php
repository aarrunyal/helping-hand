<?php

namespace App\Models\Application;

use App\Models\Destination\Destination;
use App\Models\Program\Package\Package;
use App\Models\Program\Package\PackageDates;
use App\Models\Program\Package\PackagePricing;
use App\Models\Program\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'destination_id',
        'program_id',
        'date_id',
        'pricing_id',
        'package_id',
        'first_name',
        'last_name',
        'phone_no',
        'email',
        'address',
        'date_of_birth',
        'gender',
        'nationality',
        'emergency_contact_details',
        'academic_qualification',
        'health_condition',
        'other_applicant_details',
        'applicant_questions',
        'academic_group_details',
        'is_read',
        'is_email_forwarded',
        'is_served',

    ];
    protected $appends = [ 'full_name'];

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

    public function package(){
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function date(){
        return $this->belongsTo(PackageDates::class, 'date_id');
    }

    public function duration(){
        return $this->belongsTo(PackagePricing::class, 'pricing_id');
    }



}
