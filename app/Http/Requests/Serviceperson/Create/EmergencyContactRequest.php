<?php

namespace App\Http\Requests\Serviceperson\Create;

use Illuminate\Foundation\Http\FormRequest;

class EmergencyContactRequest extends FormRequest
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
            'emergency_contact.first_name'              => 'required',
            'emergency_contact.last_name'               => 'required',
            'emergency_contact.other_names'             => 'nullable|sometimes',
            'emergency_contact.relationship_id'         => 'required',
            'emergency_contact.gender_id'               => 'required',
            'emergency_contact.employer'                => 'nullable|sometimes',
            'emergency_contact.is_primary'              => 'nullable|sometimes',
//            Address
            'emergency_contact_address.address1'                =>  'required',
            'emergency_contact_address.city_or_town_id'         =>  'required',
//            Phone
            'emergency_contact_phone.*.phone_type_id'   =>  'required',
            'emergency_contact_phone.*.number'          =>  'required|regex:/^([0-9]-?){7}$/',
//            Email
            'emergency_contact_email.*.email_type_id'   =>  'required',
            'emergency_contact_email.*.email'           =>  'required|email',

        ];
    }

    public function messages()
    {
        return [
            'emergency_contact.first_name.required'              => 'First Name is Required',
            'emergency_contact.last_name.required'               => 'Last Name is Required',
            'emergency_contact.relationship_id.required'         => 'Relationship is Required',
            'emergency_contact.gender_id.required'               => 'Gender is Required',
//            Address
            'emergency_contact_address.address1.required'        =>  'A House/Apartment number or location is required',
            'emergency_contact_address.city_or_town_id.required' =>  'The City or Town is required',
//            Phone
            'emergency_contact_phone.*.phone_type_id.required'   =>  ' ',
            'emergency_contact_phone.*.number.required'          =>  'A phone Number is required',
            'emergency_contact_phone.*.number.regex'             =>  'Please enter a valid TT phone number e.g 123-4567',
//            Email
            'emergency_contact_email.*.email_type_id.required'   =>  ' ',
            'emergency_contact_email.*.email.required'           =>  'The Email field cannot be blank',
            'emergency_contact_email.*.email.unique'             =>  'The Email already exist',
        ];
    }
}
