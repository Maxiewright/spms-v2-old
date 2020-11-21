<?php

namespace App\Http\Requests\Serviceperson\Extracurricular;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServicepersonSportRequest extends FormRequest
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
            'sport_type_id' => 'required',
            'sport_id'      => [
                'required',
                Rule::unique('serviceperson_sport', 'sport_id')->where(function ($q){
                    return $q->where('serviceperson_number', session('serviceNumber'));
                })
            ]
        ];
    }


    public function messages()
    {
        return [
            'sport_type_id.required' =>  'Please select sport type',
            'sport_id.required'      =>  'A sport is required',
            'sport_id.unique'        =>  'This sport already exist for this serviceperson'
        ];

    }
}
