<?php

namespace App\Http\Requests\Serviceperson\Create;

use Illuminate\Foundation\Http\FormRequest;

class MedicalRequest extends FormRequest
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
//           Biodata
            'biodata.eye_colour_id'     =>  'required',
            'biodata.hair_colour_id'    =>  'required',
            'biodata.skin_colour_id'    =>  'required',
            'biodata.blood_type_id'     =>  'required',
//          Height and Weight
            'height.*.height_id'        =>  'required',
            'height.*.measured_on'    =>  'required|date|before_or_equal:today',
            'weight.*.weight_id'        =>  'required',
            'weight.*.weighed_on'     =>  'required|date|before_or_equal:today',

//           Medical History
//           Vaccine
            'vaccine.*.vaccine_id'      =>  'sometimes',
            'vaccine.*.received_on'    =>  'required_with:vaccine.*.vaccine_id',

//            Allergies
//           A Service person may not have allergies - thus not require at this time.
            'allergy.*.allergy_id'      =>  'sometimes',
            'allergy.*.particulars'     =>  'nullable',

//            A Service person may not have a medical condition - thus not require at this time.
            'medical_condition.*.medical_condition_id'    => 'sometimes',
            'medical_condition.*.particulars'               => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            //        Medical Data
//            Biodata
            'biodata.eye_colour_id.required'           =>  'Eye colour is required',
            'biodata.hair_colour_id.required'          =>  'Hair colour is required',
            'biodata.skin_colour_id.required'          =>  'Skin colour is required',
            'biodata.blood_type_id.required'           =>  'Blood type is required',
//          Height and Weight
            'height.*.height_id.required'              =>  ' ',
            'height.*.measured_on.required'          =>  'Date measured is required',
            'height.*.measured_on.before_or_equal'   =>  'Date measured cannot be a future date',
            'weight.*.weight_id.required'              =>  ' ',
            'weight.*.weighed_on.required'           =>  'Date weighed is required',
            'weight.*.weighed_on.before_or_equal'    =>  'Date weighed cannot be a future date',
//        Vaccine
            'vaccine.*.received_on.required_with'      => 'A vaccine date is required with vaccine',
            'vaccine.*.received_on.before_or_equal'    => 'Vaccine receipt date cannot be after today',
        ];
    }
}
