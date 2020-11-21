<?php

namespace App\Http\Requests\Serviceperson\ServiceData;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReEngagementRequest extends FormRequest
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
            're_engagement_period_id' =>  'required',
            'requested_on' =>  'required|date|before_or_equal:today',
            'medical_classification_id' =>['required',
                Rule::unique('re_engagements', 'medical_classification_id')->where(function ($q){
                    return $q->where('serviceperson_number', $this->request->get('serviceperson_number'));
                })],
            'recommendation_status_id' =>  'required',
            'recommended_by' =>  'required|numeric',
            'recommended_on' =>  'required|date|after_or_equal:requested_on',
            'recommendation_particulars' =>  'sometimes',
            'approval_status_id' =>  'required',
            'approved_by' =>  'required|numeric',
            'approved_on' =>  'required|date|after_or_equal:recommended_on',
            'approval_particulars' =>  'sometimes',
        ];
    }


    public function messages()
    {
        return [
            're_engagement_period_id.required' =>  'Re-engagement period is required',
            'requested_on.required' =>  'Request date required',
            'requested_on.before_or_equal' =>  'must be today or before',
            'medical_classification_id.required' =>  'PULHHEEMS data required',
            'medical_classification_id.unique' =>  'The PULHHEEMS data has already been used.',
            'recommendation_status_id.required' =>  'Recommendation status required',
            'recommended_by.required' =>  'Recommender required',
            'recommended_on.required' =>  'Recommendation date required',
            'recommended_on.after_or_equal' =>  'Cannot be before request date',
            'recommendation_particulars' =>  'sometimes',
            'approval_status_id.required' =>  'Approval status required',
            'approved_by.required' =>  'Approver required',
            'approved_on.required' =>  'Approval date required',
            'approved_on.after_or_equal' =>  'Cannot be before recommendation date',
            'approval_particulars' =>  'sometimes',
        ];
    }

}
