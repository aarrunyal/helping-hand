<?php

namespace App\Models\Application;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "first_name",
        "last_name",
        "phone_no",
        "email",
        "address",
        "date_of_birth",
        "gender",
        "nationality",
        "destination_id",
        "program_id",
        "date_id",
        "pricing_id",
        "emergency_contact_details",
        "academic_qualification",
        "health_condition",
        "other_applicant_details",
        "applicant_questions",
        "academic_group_details",
    ];
}
