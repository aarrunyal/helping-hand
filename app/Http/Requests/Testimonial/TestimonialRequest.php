<?php

namespace App\Http\Requests\Testimonial;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
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
            "description" => "required",
            "destination_id" => "required",
            "from" => "required",
        ];
    }

    public function messages()
    {
        return [
            "description.required" => "Field is required",
            "destination_id.required" => "Field is required",
            "from.required" => "Field is required",
        ];
    }
}
