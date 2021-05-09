<?php

namespace App\Http\Requests\Front\Inquiry;

use Illuminate\Foundation\Http\FormRequest;

class InquiryRequest extends FormRequest
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
            'first_name' => "required",
            'last_name' => "required",
            'phone_no' => "required",
            'email' => "required",
            'address' => "required",
            'planed_for' => "required",
            'destination_id' => "required",
            'program_id' => "required",
            'message_permitted' => "required",
//            "g-recaptcha-response" => "recaptcha"
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => "First name is required",
            'last_name.required' => "Last name is required",
            'phone_no.required' => "Phone no is required",
            'email.required' => "Email is required",
            'address.required' => "Address is required",
            'planed_for.required' => "Field is required",
            'destination_id.required' => "Destination  is required",
            'program_id.required' => "Program is required",
            'message_permitted.required' => "Field no is required",
//            "g-recaptcha-response.recaptcha" => 'Recaptcha is no checked',
        ];
    }
}
