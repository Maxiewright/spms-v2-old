<?php

namespace App\Http\Requests\Serviceperson\Contact;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicepersonAddressRequest extends FormRequest
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
            'address1'                =>  'required',
            'city_or_town_id'         =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'address1.required'               =>  'An address is required',
            'city_or_town_id.required'        =>  'A City or Town is required',
        ];
    }
}
