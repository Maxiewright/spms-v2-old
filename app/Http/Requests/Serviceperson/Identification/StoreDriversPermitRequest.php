<?php

namespace App\Http\Requests\Serviceperson\Identification;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDriversPermitRequest extends FormRequest
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
            'number'                                =>  'required|numeric|unique:drivers_permits,number',
            'drivers_permit_type_id'                =>  [
                'required',
                Rule::unique('drivers_permits', 'drivers_permit_type_id')->where(function ($q){
                    return $q->where('serviceperson_number', session('serviceNumber'));
                })
                ],
            'drivers_permit_class_id'               =>  'required',
            'drivers_permit_transaction_code_id'    =>  'required',
            'issued_on'                            =>  'required|before_or_equal:today',
            'expired_on'                           =>  'required|after:driver_permit_issued_on|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return[
            'number.numeric'                               =>  'Drivers Permit must be a number',
            'number.unique'                                =>  'This Drivers Permit number already exist',
            'drivers_permit_type_id.unique'                =>  'This type of Drivers Permit is already on file',
            'drivers_permit_type_id.required'              =>  'Drivers permit type is required',
            'drivers_permit_class_id.required'             =>  'Drivers permit class is required',
            'drivers_permit_transaction_code_id.required'  =>  'Drivers permit code is required',
            'issued_on.required'                          =>  'An issue date is required',
            'issued_on.before_or_equal'                   =>  'The issue date cannot be after today',
            'expired_on.required'                         =>  'An expiry date is required',
            'expired_on.after'                            =>  'The expiry date cannot be before the issue date',
            'expired_on.after_or_equal'                   =>  'The expiry date cannot be before today',
        ];
    }
}
