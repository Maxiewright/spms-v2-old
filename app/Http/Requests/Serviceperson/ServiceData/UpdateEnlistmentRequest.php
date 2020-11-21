<?php

namespace App\Http\Requests\Serviceperson\ServiceData;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEnlistmentRequest extends FormRequest
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
            'enlistment_type_id'  => 'required',
            'engagement_period_id' => 'required',
            'date'                =>  'required|date|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'enlistment_type_id.required'   =>  'Enlistment type is required',
            'engagement_period_id.required' =>  'Engagement Period is required',
            'date.required'                 =>  'Enlistment date is required',
        ];
    }
}
