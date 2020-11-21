<?php

namespace App\Http\Requests\Serviceperson\ServiceData;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'job_id'            =>  'required',
            'started_on'        =>  'required|date|before_or_equal:today',
            'ended_on'          =>  'nullable|date|after:appointment_started_on',
        ];
    }

    public function messages()
    {
        return [
            'job_id.required'            =>  'Job data is required',
            'started_on.required'        =>  'The start date is required',
            'started_on.before_or_equal' =>  'The appointment start date cannot be after today',
            'ended_on.after'             =>  'The appointment end date cannot be before start date',
        ];
    }
}
