<?php

namespace App\Http\Requests\Serviceperson\MedicalHistory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicepersonHeightRequest extends FormRequest
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
            'height_id'        =>  'required',
            'measured_on'    =>  'required|date|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'height_id.required'       =>  'Height is required',
            'measured_on.required'   =>  'Date measured is required',
            'measured_on.before_or_equal'   =>  'Date measured cannot not be after today',
        ];
    }
}
