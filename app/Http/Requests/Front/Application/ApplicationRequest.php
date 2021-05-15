<?php

namespace App\Http\Requests\Front\Application;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => 'required',
            "last_name" => 'required',
            "phone_no" => 'required',
            "email" => 'required',
            "address" => 'required',
            "date_of_birth" => 'required',
            "gender" => 'required',
            "nationality" => 'required',
            "destination_id" => 'required',
            "program_id" => 'required',
            "package_id" => 'required',
            "date_id" => 'required',
            "pricing_id" => 'required',
            "emergency_contact_details" => 'required',
            "academic_qualification" => 'required',
//            "g-recaptcha-response" => "recaptcha"
        ];
    }

    public function messages()
    {
        return [
            "first_name.required" => 'First name is required',
            "last_name.required" => 'Last name is required',
            "phone_no.required" => 'Phone No. is required',
            "email.required" => 'Email is required',
            "address.required" => 'Address is required',
            "date_of_birth.required" => 'Date of Birth is required',
            "genderId.required" => 'Gender is required',
            "nationality.required" => 'Nationality is required',
            "destination_id.required" => 'Destination is required',
            "program_id.required" => 'Program is required',
            "date_id.required" => 'Date is required',
            "pricing_id.required" => 'Duration is required',
            "emergency_contact_details.required" => 'Emergency contact is required',
            "academic_qualification.required" => 'Academic Qualification is required',
//            "g-recaptcha-response.recaptcha" => 'Recaptcha is no checked',
        ];
    }
}
