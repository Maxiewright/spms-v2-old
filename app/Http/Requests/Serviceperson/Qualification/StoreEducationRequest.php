<?php

namespace App\Http\Requests\Serviceperson\Qualification;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducationRequest extends FormRequest
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
            'education_level_id'        =>  'required',
            'subject_id'      =>  'required',
            'education_grade_id'        =>  'required',
            'date_completed'            =>  'required|date|before_or_equal:today',
            'school_id'  =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'education_level_id.required'       =>  'Please select qualification level',
            'subject_id.required'     =>  'Education field is required',
            'education_grade_id.required'       =>  'Grade is required',
            'date_completed.required'           =>  'An approximate completion date is required',
            'date_completed.before_or_equal'    =>  'The end date must be a date before or equal to today',
            'school_id.required' =>  'A School or Institution is required',
        ];
    }
}
