<?php

namespace App\Http\Requests\Serviceperson\Create;

use Illuminate\Foundation\Http\FormRequest;

class IdentificationRequest extends FormRequest
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
            //             Identification
//                National ID
            'national_id.number'          =>  'required|numeric|digits:11|unique:national_id_cards,number',
            'national_id.date_of_birth'   =>  'required|date|before_or_equal:tomorrow',
            'national_id.place_of_birth'  =>  'required',
            'national_id.gender_id'       =>  'required',
            'national_id.issued_on'      =>  'required|date|before_or_equal:tomorrow',
            'national_id.expired_on'     =>  'required|date|after:today',

//                Drivers Permit
            'drivers_permit.*.number'                               =>  'sometimes|nullable|numeric|unique:drivers_permits,number|required_with:drivers_permit.*.drivers_permit_type_id,drivers_permit.*.drivers_permit_class_id','drivers_permit.*.drivers_permit_transaction_code_id','drivers_permit.*.issued_on','drivers_permit.*.expired_on',
            'drivers_permit.*.drivers_permit_type_id'               =>  'required_with:drivers_permit.*.number',
            'drivers_permit.*.drivers_permit_class_id'              =>  'required_with:drivers_permit.*.number',
            'drivers_permit.*.drivers_permit_transaction_code_id'   =>  'required_with:drivers_permit.*.number',
            'drivers_permit.*.issued_on'                           =>  'required_with:drivers_permit.*.number|nullable|date|before_or_equal:today',
            'drivers_permit.*.expired_on'                          =>  'required_with:drivers_permit.*.number|nullable|date|after:today',

//                Military ID
            'military_id.number'        =>  'required|numeric|unique:military_id_cards,number',
            'military_id.issued_on'    =>  'required|date|before_or_equal:today',
            'military_id.expired_on'   =>  'required|date|after:military_id.issued_on|after:today',

//                Passport
            'passport.number'       =>  'sometimes|nullable|unique:passports,number',
            'passport.issued_on'   =>  'required_with:passport.number|nullable|before_or_equal:today',
            'passport.expired_on'  =>  'required_with:passport.number|nullable|after:today' ,

        ];
    }

    public function messages()
    {
        return [
            //            Identification
//                National ID Messages
            'national_id.number.required'               =>  'National ID Card Number required',
            'national_id.number.numeric'                =>  'National ID Number must be a number',
            'national_id.number.unique'                 =>  'This National ID Number already exist',
            'national_id.date_of_birth.required'        =>  'Date of birth is required',
            'national_id.date_of_birth.before_or_equal' =>  'This date of birth cannot be after today',
            'national_id.place_of_birth.required'       =>  'Place of birth is required',
            'national_id.gender_id.required'            =>  'Gender is required',
            'national_id.issued_on.required'           =>  'An issue date is required',
            'national_id.issued_on.before_or_equal'    =>  'The issue date cannot be a future date',
            'national_id.expired_on.required'          =>  'An expiry date is required',
            'national_id.expired_on.after'             =>  'The expiry date must be a date after today',

//                Drivers Permit Messages
            'drivers_permit.*.number.numeric'                                   =>  'Drivers Permit must be a number',
            'drivers_permit.*.number.unique'                                    =>  'This Drivers Permit number already exist',
            'drivers_permit.*.number.required_with'                            =>   'DP number required when other DP fields are present',
            'drivers_permit.*.drivers_permit_type_id.required_with'              =>  'Drivers permit type is required',
            'drivers_permit.*.drivers_permit_class_id.required_with'             =>  'Drivers permit class is required',
            'drivers_permit.*.drivers_permit_transaction_code_id.required_with'  =>  'Drivers permit Code is required',
            'drivers_permit.*.issued_on.required_with'                          =>  'An issue date is required',
            'drivers_permit.*.issued_on.before_or_equal'                        =>  'The issue date cannot be a future date',
            'drivers_permit.*.expired_on.required_with'                         =>  'An expiry date is required',
            'drivers_permit.*.expired_on.after'                                 =>  'The expiry date must be a date after today',

//                Military ID
            'military_id.number.required'             =>  'A Military ID card is required',
            'military_id.number.unique'               =>  'This Military ID card already exist',
            'military_id.issued_on.required'         =>  'An issue date is required',
            'military_id.issued_on.before_or_equal'  =>  'The issue date cannot be a future date',
            'military_id.expired_on.required'        =>  'An expiry date is required',
            'military_id.expired_on.after'           =>  'The expiry date must be a date after today',

//                Passport
            'passport.number.unique'                =>  'This passport already exist' ,
            'passport.issued_on.required_with'     =>  'Issue date required',
            'passport.issued_on.before_or_equal'   =>  'The issue date cannot be a future date',
            'passport.expired_on.required_with'    =>  'Expiry date required',
            'passport.expired_on.after'            =>  'The expiry date must be a date after today',
        ];
    }
}
