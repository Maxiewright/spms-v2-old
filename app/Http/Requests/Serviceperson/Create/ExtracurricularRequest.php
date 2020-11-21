<?php

namespace App\Http\Requests\Serviceperson\Create;

use App\Models\System\Serviceperson\Extracurricular\Hobby;
use Illuminate\Foundation\Http\FormRequest;

class ExtracurricularRequest extends FormRequest
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
//            Sport
            'sport.*.sport_type_id' => 'sometimes',
            'sport.*.sport_id'      => 'required_with:sport.*.sport_type_id',

//            Hobby
            'hobby.*.hobby_type_id' => 'sometimes',
            'hobby.*.hobby_id'      => 'required_with:hobby.*.hobby_type_id'
        ];
    }

    public function messages()
    {
        return [
//            Sport
            'sport.*.sport_id.required_with'      => 'Sport is required with Sport type',
//            Hobby
            'hobby.*.hobby_id.required_with'      => 'Hobby id required with Hobby Type'
        ];

    }
}
