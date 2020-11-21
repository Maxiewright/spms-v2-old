<?php

namespace App\Http\Requests\Serviceperson\Identification;

use Illuminate\Foundation\Http\FormRequest;

class StorePassportRequest extends FormRequest
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
            'number'       =>  'required|unique:passports,number',
            'issued_on'   =>  'required|before_or_equal:today',
            'expired_on'  =>  'required|after:issued_on|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'number.required'              =>  'The passport number is required',
            'number.unique'                =>  'This passport already exist' ,
            'issued_on.required'          =>  'Issue date required',
            'issued_on.before_or_equal'   =>  'The issue date cannot be after today',
            'expired_on.required'         =>  'Expiry date required',
            'expired_on.after'            =>  'The expiry date cannot be before the issue date',
            'expired_on.after_or_equal'   =>  'The expiry date cannot be before today',
        ];
    }
}
