<?php

namespace App\Http\Requests\Serviceperson\EmergencyContact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmergencyContactRequest extends FormRequest
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
            'first_name'      => 'required',
            'last_name'       => 'required',
            'other_names'     => 'nullable|sometimes',
            'relationship_id' => 'required',
            'gender_id'       => 'required',
            'employer'        => 'nullable',
//            Address
            'address1'        =>  'required',
            'city_or_town_id' =>  'required',
//            Phone
            'phone_type_id'   =>  'required',
            'number'          =>  'required|regex:/^([0-9]-?){7}$/',
//            Email
            'email_type_id'   =>  'required',
            'email'           =>  'required|email',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'      => 'First Name is Required',
            'last_name.required'       => 'Last Name is Required',
            'relationship_id.required' => 'Relationship is Required',
            'gender_id.required'       => 'Gender is Required',
//            Address
            'address1.required'        =>  'A House/Apartment number or location is required',
            'city_or_town_id.required' =>  'The City or Town is required',
//            Phone
            'phone_type_id.required'   =>  ' ',
            'number.required'           =>  'A phone Number is required',
            'number.regex'              =>  'Please enter a valid TT phone number e.g 123-4567',
//            Email
            'email_type_id.required'   =>  ' ',
            'email.required'           =>  'The Email field cannot be blank',
            'email.unique'             =>  'The Email already exist',
        ];
    }
}
