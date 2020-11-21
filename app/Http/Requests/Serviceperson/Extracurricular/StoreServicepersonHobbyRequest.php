<?php

namespace App\Http\Requests\Serviceperson\Extracurricular;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use MongoDB\Driver\Session;

class StoreServicepersonHobbyRequest extends FormRequest
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
            'hobby_type_id' => 'required',
            'hobby_id'      => [
                'required',
                Rule::unique('serviceperson_hobby', 'hobby_id')->where(function ($q){
                    return $q->where('serviceperson_number', session('serviceNumber'));
                })
            ]

        ];
    }

    public function messages()
    {
        return [
            'hobby_type_id.required' => 'Please select a hobby type',
            'hobby_id.required'      => 'A hobby is required',
            'hobby_id.unique'        => 'This hobby already exist for this serviceperson'
        ];
    }
}
