<?php

namespace App\Http\Requests\Serviceperson\Create;

use Illuminate\Foundation\Http\FormRequest;

class ServiceDataRequest extends FormRequest
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
//                Enlistment
            'enlistment.*.enlistment_type_id'   =>  'required',
            'enlistment.*.date'                 =>  'required|date|before_or_equal:today',
            'enlistment.*.engagement_period_id' =>  'required',

//                Promotion
            'rank.*.rank_id'           =>  'required',
            'rank.*.promoted_on'    =>  'required|date|before_or_equal:today',

//            Decoration
            'decoration.*.decoration_id'    => 'sometimes',
            'decoration.*.received_on'     => 'required_with:decoration.*.decoration_id|before_or_equal:today',
//
//            Military Appointment
            'appointment.*.appointment_id'      =>  'required',
            'appointment.*.started_on'          =>  'required|date|before_or_equal:today',
            'appointment.*.ended_on'            =>  'sometimes|nullable|date|after:appointment.*.started_on',

//            Serviceperson Job Data

            'serviceperson_job.*.branch_id'       =>  'nullable',
            'serviceperson_job.*.career_path_id'  =>  'nullable',
            'serviceperson_job.*.career_path_id'  =>  'nullable',
            'serviceperson_job.*.job_id'          =>  'required',
            'serviceperson_job.*.speciality_id'   =>  'nullable',
            'serviceperson_job.*.started_on'    =>  'required|date|before_or_equal:today',
            'serviceperson_job.*.ended_on'    =>  'nullable|date|after:joined_on',

//            Unit data
            'unit.*.company_id'         =>  'required',
            'unit.*.joined_on'        =>  'required|date|before_or_equal:today',
            'unit.*.left_on'          =>  'sometimes|nullable|date|after:unit.*.joined_on',
        ];
    }

    public function messages()
    {
        return [
            //Service Data
//                Enlistment
            'enlistment.*.enlistment_type_id.required'      =>  'Enlistment data is required',
            'enlistment.*.date.required'                    =>  'Enlistment date is required',
            'enlistment.*.engagement_period_id.required'    =>  'Engagement Period is required',

//                Promotion
            'rank.*.rank_id.required'               =>  'Promotion information is required',
            'rank.*.promoted_on.required'        =>  'Promotion date is required',
            'rank.*.promoted_on.before_or_equal' =>  'The promotion date cannot be a future date',

//            Decoration
            'decoration.*.received_on.required_with'    => 'Date required with Award',
            'decoration.*.received_on.before_or_equal'  => 'The award receipt date cannot be a future date',
//
//            Military Appointment
            'appointment.*.appointment_id.required'     =>  'The Serviceperson Job data is required',
            'appointment.*.started_on.required'         =>  'The start date is required',
            'appointment.*.started_on.before_or_equal'  =>  'The appointment start date cannot be after today',
            'appointment.*.ended_on.after'              =>  'The appointment end date cannot be before start date',

//            Serviceperson Job Data
//            'serviceperson_job.*.career_path_id.required'         =>  'Career Path is required',
            'serviceperson_job.*.job_id.required'                 =>  'Job is required',
            'serviceperson_job.*.started_on.required'           =>  'Date started is required',
            'serviceperson_job.*.started_on.before_or_equal'    =>  'Date started cannot be after today',
            'serviceperson_job.*.ended_on.after'              =>  'Date left cannot be before date joined',

//            Unit data
//            'unit.*.battalion_id.required'         =>  'The Serviceperson unit data is required',
            'unit.*.company_id.required'           =>  'Company is required',
//            'unit.*.platoon_id.required'           =>  'Plt or Dept is required',
            'unit.*.joined_on.required'          =>  'Date joined is required',
            'unit.*.joined_on.before_or_equal'   =>  'Date Joined cannot be a future date',
            'unit.*.left_on.after'               =>  'Date left cannot be before date joined',
        ];
    }
}
