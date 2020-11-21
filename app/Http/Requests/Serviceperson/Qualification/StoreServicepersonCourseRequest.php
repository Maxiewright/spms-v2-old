<?php

namespace App\Http\Requests\Serviceperson\Qualification;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicepersonCourseRequest extends FormRequest
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
            'course_type_id'           =>  'required',
            'course_institution_id'    =>  'required',
            'course_id'                =>  'required',
            'course_qualification_id'  =>  'required',
            'place_on_course'          =>  'nullable|numeric',
            'started_on'               =>  'required|date|before:today',
            'ended_on'                 =>  'required|date|after:started_on|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'course_type_id.required'             =>  'Course type is required',
            'course_institution_id.required'      =>  'The Course institution is required',
            'course_id.required'                  =>  'The course is required',
            'course_qualification_id.required'    =>  'The course qualification is required',
            'place_on_course.numeric'             =>  'Place on course should be a number',
            'started_on.required'                 =>  'A start date is required',
            'started_on.before'                   =>  'The start date must be before today',
            'ended_on.required'                   =>  'An end date is required',
            'ended_on.after'                      =>  'The end date cannot be before start date',
            'ended_on.before_or_equal'            =>  'The end date cannot be after today',
        ];
    }
}
