<?php

namespace App\Http\Requests\Serviceperson\Identification;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNationalIdRequest extends FormRequest
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

            'issued_on'      =>  'required | date | before_or_equal:tomorrow',
            'expired_on'     =>  'required | date | after:issued_on',
        ];
    }
    public function messages()
    {
        return [

            'issued_on.required'           =>  'An issue date is required',
            'issued_on.before_or_equal'    =>  'The issue date cannot be after today',
            'expired_on.required'          =>  'An expiry date is required',
            'expired_on.after'             =>  'The expiry date cannot be before today',
        ];
    }
}
