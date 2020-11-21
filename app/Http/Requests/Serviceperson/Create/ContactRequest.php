<?php

namespace App\Http\Requests\Serviceperson\Create;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'address.address1'          =>  'required',
            'address.city_or_town_id'   =>  'required',
            'phone.*.phone_type_id'     =>  'required',
            'phone.*.number'            =>  'required|regex:/^([0-9]-?){7}$/',
            'email.*.email_type_id'     =>  'required',
            'email.*.email'             =>  'required|email',
        ];
    }
    public function messages()
    {
        return [
            'address.address1.required'             =>  'A House/Apartment number or location is required',
            'address.address2.required'             =>  'A Street Address is required',
            'address.city_or_town_id.required'      =>  'The City or Town is required',
            'phone.*.phone_type_id.required'        =>  ' ',
            'phone.*.number.required'               =>  'The Phone field cannot be blank',
            'phone.*.number.regex'                  =>  'Please enter a valid TT phone number e.g 123-4567',
            'email.*.email_type_id.required'        =>  ' ',
            'email.*.email.required'                =>  'The Email field cannot be blank',
            'email.*.email.unique'                  =>  'The Email already exist',
        ];
    }
}
