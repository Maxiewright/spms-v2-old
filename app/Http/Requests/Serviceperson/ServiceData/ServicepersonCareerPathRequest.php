<?php

namespace App\Http\Requests\Serviceperson\ServiceData;

use Illuminate\Foundation\Http\FormRequest;

class ServicepersonCareerPathRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'career_path_id'  =>  'required',
            'speciality_id'   =>  'nullable',
            'date_started'    =>  'required|date|before_or_equal:today',
            'date_stopped'    =>  'nullable|date|after:joined_on',
        ];
    }
    public function messages()
    {
        return [
            'career_path_id.required'         =>  'Career Path is required',
            'date_started.required'           =>  'Date started is required',
            'date_started.before_or_equal'    =>  'Date started cannot be after today',
            'date_stopped.after'              =>  'Date left cannot be before date joined',
        ];
    }
}
