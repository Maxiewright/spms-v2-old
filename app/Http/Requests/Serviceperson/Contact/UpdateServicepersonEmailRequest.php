<?php

namespace App\Http\Requests\Serviceperson\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateServicepersonEmailRequest extends FormRequest
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
            'email' =>  'required|email|unique:email_addresses,email',
        ];
    }

    public function messages()
    {
        return [
            'email.required'         =>  'An Email is required',
            'email.unique'           =>  'This Email already exist',
        ];
    }
}
