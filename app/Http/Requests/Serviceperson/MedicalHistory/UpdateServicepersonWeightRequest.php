<?php

namespace App\Http\Requests\Serviceperson\MedicalHistory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServicepersonWeightRequest extends FormRequest
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
            'weight_id'        =>  'required',
            'weighed_on'     =>  'required|date|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'weight_id.required'             =>  'Weight is required',
            'weighed_on.required'          =>  'Date weighed is required',
            'weighed_on.before_or_equal'   =>  'Date weighed cannot not be after today',
        ];
    }
}
