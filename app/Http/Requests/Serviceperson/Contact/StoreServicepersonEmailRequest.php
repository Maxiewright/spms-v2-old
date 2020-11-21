<?php

namespace App\Http\Requests\Serviceperson\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServicepersonEmailRequest extends FormRequest
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
            'email_type_id' =>  [
                'required',
               Rule::unique('email_addressables', 'email_type_id')->where(function ($q){
                   $q->where('email_addressable_id', $this->request->get('serviceperson_number'));
               })
             ],
            'email' =>  'required|email|unique:email_addresses,email',
        ];
    }

    public function messages()
    {
        return [
            'email_type_id.required' =>  'An Email Type is required',
            'email_type_id.unique'   =>  'This serviceperson already has this email type on file',
            'email.required'         =>  'An Email is required',
            'email.unique'           =>  'This Email already exist',
        ];
    }
}
