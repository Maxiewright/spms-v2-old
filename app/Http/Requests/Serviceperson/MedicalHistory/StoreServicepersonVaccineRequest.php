<?php

namespace App\Http\Requests\Serviceperson\MedicalHistory;

use Illuminate\Foundation\Http\FormRequest;

class StoreServicepersonVaccineRequest extends FormRequest
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
            'vaccine_id'   =>  'sometimes',
            'received_on' =>  'nullable|required_with:vaccine_id|date|before_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'received_on.required_with'   => 'A vaccine date is required',
            'received_on.before_or_equal' => 'Vaccine receipt date cannot be after today',
        ];
    }
}
