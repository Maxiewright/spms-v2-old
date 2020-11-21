<?php

namespace App\Http\Requests\Serviceperson\MedicalHistory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBiodataRequest extends FormRequest
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
            'eye_colour_id'     =>  'required',
            'hair_colour_id'    =>  'required',
            'skin_colour_id'    =>  'required',
            'blood_type_id'     =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'eye_colour_id.required'  =>  'Eye colour is required',
            'hair_colour_id.required' =>  'Hair colour is required',
            'skin_colour_id.required' =>  'Skin colour is required',
            'blood_type_id.required'  =>  'Blood type is required',
        ];
    }
}
