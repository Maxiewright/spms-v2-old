<?php

namespace App\Http\Requests\Serviceperson\Create;

use Illuminate\Foundation\Http\FormRequest;

class BasicInfoRequest extends FormRequest
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
            'serviceperson.photo'                 =>  'required',
            'serviceperson.number'                =>  'required|numeric|digits_between:3,5|unique:servicepeople,number',
            'serviceperson.first_name'            =>  'required|alpha-dash',
            'serviceperson.last_name'             =>  'required|alpha-dash',
            'serviceperson.marital_status_id'     =>  'required',
            'serviceperson.religion_id'           =>  'required',
            'serviceperson.ethnicity_id'          =>  'required',
        ];
    }

    public  function messages()
    {
        return [
//            All date attributes
            'date' => 'This is not a valid date',

//            Basic Information Messages
            'serviceperson.photo.required' => 'A Serviceperson photo is required',
            'serviceperson.number.unique' => 'The service number already exist',
            'serviceperson.number.required' => 'A Service Number is required',
            'serviceperson.number.digits_between' => 'The Service Number must be between 3 and 5 digits',
            'serviceperson.first_name.required' => 'A first name is required',
            'serviceperson.last_name.required' => 'A last name is required',
            'serviceperson.marital_status_id.required' => 'Marital Status is required',
            'serviceperson.religion_id.required' => 'Religion is required',
            'serviceperson.ethnicity_id.required' => 'Ethnicity is required',
        ];

    }
}
