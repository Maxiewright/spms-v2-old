<?php

namespace App\Http\Requests\Serviceperson\ServiceData;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAwardRequest extends FormRequest
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
            'decoration_id'    => 'required',
            'received_on'     => 'required|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'decoration_id.required'        => 'Decoration type is required',
            'decoration_id.unique'          => 'The serviceperson already has this Award',
            'received_on.required'         => 'receipt date is required',
            'received_on.before_or_equal'  => 'The decoration receipt date cannot be after today',
        ];
    }
}
