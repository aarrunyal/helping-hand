<?php

namespace App\Http\Requests\Back\SystemUser;

use Illuminate\Foundation\Http\FormRequest;

class SystemUserRequest extends FormRequest
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
        $rule = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required | email',
            'phone' => 'required',
            'password' => 'required',
            'user_type' => 'required',
            'is_active' => 'required'
        ];
        return $rule;
    }
}
