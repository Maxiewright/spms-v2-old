<?php

namespace App\Http\Requests\Serviceperson\ServiceData;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
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
            'company_id'    =>  'required',
            'platoon_id'    =>  'sometimes',
            'section_id'    =>  'required_with:platoon_id',
            'joined_on'   =>  'required|date|before_or_equal:today',
            'posted_on'     =>  'nullable|date|after_or_equal:joined_on',
            'left_on'     =>  'nullable|date|after:joined_on',
        ];
    }

    public function messages()
    {
        return [
            'company_id.required'           =>  'Company is required',
            'section_id.required_with'      =>  'Section data is required with platoon data',
            'joined_on.required'          =>  'Date joined is required',
            'joined_on.before_or_equal'   =>  'Date Joined cannot be after today',
            'posted_on.after_or_equal'      =>  'Posting date must be after or equal to date joined',
            'left_on.after'               =>  'Date left cannot be before date joined',
        ];
    }
}
