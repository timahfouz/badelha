<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'city' => 'required',
            'area' => 'required',
            'street_name' => 'required',
            'building_name' => 'required',
            'apartment_number' => 'nullable',
            'lat' => 'nullable',
            'lon' => 'nullable',
        ];
    }
}
