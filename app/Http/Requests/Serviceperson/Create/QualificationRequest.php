<?php

namespace App\Http\Requests\Serviceperson\Create;

use Illuminate\Foundation\Http\FormRequest;

class QualificationRequest extends FormRequest
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
            //        Formal Education
            'education.*.education_level_id'        =>  'required',
            'education.*.subject_id'      =>  'required',
            'education.*.education_grade_id'        =>  'required',
            'education.*.completed_on'            =>  'required|date|before_or_equal:today',
            'education.*.school_id'  =>  'required',

//            Courses
            'course.*.course_type_id'           =>  'sometimes',
            'course.*.course_institution_id'    =>  'required_with:course.*.course_type_id',
            'course.*.course_id'                =>  'required_with:course.*.course_type_id',
            'course.*.course_qualification_id'  =>  'required_with:course.*.course_type_id',
            'course.*.place_on_course'          =>  'nullable|numeric',
            'course.*.started_on'               =>  'required_with:course.*.course_type_id|nullable|date|before_or_equal:today',
            'course.*.ended_on'                 =>  'required_with:course.*.course_type_id|nullable|date|after:course.*.started_on',

        ];
    }

    public function messages()
    {
        return [
//        Education
            'education.*.education_level_id.required'       =>  'Education info is required',
            'education.*.subject_id.required'     =>  'A subject or course is required',
            'education.*.education_grade_id.required'       =>  'A Grade is required',
            'education.*.completed_on.required'             =>  'An approximate completion date is required',
            'education.*.completed_on.before_or_equal'      =>  'The end date cannot be a future date',
            'education.*.school_id.required' =>  'A School or Institution is required',
//            Courses
            'course.*.course_institution_id.required_with'      =>  'The Course institution is required',
            'course.*.course_id.required_with'                  =>  'The course is required',
            'course.*.course_qualification_id.required_with'    =>  'The course qualification is required',
            'course.*.place_on_course.numeric'                  =>  'Place on course must be a number',
            'course.*.started_on.required_with'                 =>  'The course start date is required',
            'course.*.started_on.before_or_equal'               =>  'The course start date cannot be a future date',
            'course.*.ended_on.required_with'                   =>  'The course end date is required',
            'course.*.ended_on.after'                           =>  'The course end date cannot be before start date',
        ];
    }
}
