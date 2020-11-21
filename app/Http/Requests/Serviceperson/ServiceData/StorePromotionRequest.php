<?php

namespace App\Http\Requests\Serviceperson\ServiceData;

use Illuminate\Foundation\Http\FormRequest;

class StorePromotionRequest extends FormRequest
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
            'rank_id'           =>  'required',
            'promoted_on'    =>  'required | date | before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'rank_id.required'           =>  'Promotion information is required',
            'promoted_on.required'    =>  'Promotion date is required',
            'rank_id.before_or_equal'    =>  'The promotion date cannot be after today',
        ];
    }
}
