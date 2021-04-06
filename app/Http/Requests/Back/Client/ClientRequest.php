<?php

namespace App\Http\Requests\Back\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        $request = [
            "title" => "required",

        ];
        if (empty($this->id))
            $request['image'] = "required";
        return $request;
    }
}
