<?php

namespace App\Http\Requests\Serviceperson\ServiceData;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEnlistmentRequest extends FormRequest
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
            'enlistment_type_id'  =>  [
                'required',
                Rule::unique('enlistments', 'enlistment_type_id')->where(function ($q){
                    $q->where('serviceperson_number', session('serviceNumber'));
                })
            ],
            'engagement_period_id' => 'required',
            'date'                =>  'required|date|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'enlistment_type_id.required'   =>  'Enlistment type is required',
            'enlistment_type_id.unique'     =>  'This enlistment type already exist for this serviceperson',
            'engagement_period_id.required' =>  'Engagement Period is required',
            'date.required'                 =>  'Enlistment date is required',
        ];
    }
}
