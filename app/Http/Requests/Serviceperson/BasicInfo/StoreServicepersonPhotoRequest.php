<?php

namespace App\Http\Requests\Serviceperson\BasicInfo;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicepersonPhotoRequest extends FormRequest
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
            'photo' =>  'required|image',
        ];
    }

    public function messages()
    {
        return [
            'photo.required'  =>  'A Serviceperson photo is required',
        ];

    }
}
