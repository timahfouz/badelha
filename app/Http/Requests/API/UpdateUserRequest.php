<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name'  => 'nullable|min:2',
            'email' => 'nullable|email|unique:users,email,'.getUser()->id,
            'phone' => 'nullable|unique:users,phone,'.getUser()->id,
            'password' => 'nullable|min:8|confirmed',
            'image' => 'nullable|image',
        ];
    }
}
