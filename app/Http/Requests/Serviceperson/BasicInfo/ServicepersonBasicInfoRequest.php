<?php

namespace App\Http\Requests\Serviceperson\BasicInfo;

use Illuminate\Foundation\Http\FormRequest;

class ServicepersonBasicInfoRequest extends FormRequest
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

            'number'                    => 'required|numeric|digits_between:3,5',
            'first_name'                => 'required',
            'middle_name'               => 'nullable',
            'last_name'                 => 'required',
            'other_names'               => 'nullable',
            'marital_status_id'         => 'required',
            'religion_id'               => 'required',
            'ethnicity_id'              => 'required',
        ];
    }

    public function messages()
    {
       return [
           'number.unique'                 =>  'The service number already exist',
           'number.required'               =>  'A Service Number is required',
           'first_name.required'           =>  'A first name is required',
           'last_name.required'            =>  'A last name is required',
           'marital_status_id.required'    =>  'Marital Status is required',
           'religion_id.required'          =>  'Religion is required',
           'ethnicity_id.required'         =>  'Ethnicity is required',
       ];

    }
}
