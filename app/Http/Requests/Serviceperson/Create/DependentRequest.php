<?php

namespace App\Http\Requests\Serviceperson\Create;

use Illuminate\Foundation\Http\FormRequest;

class DependentRequest extends FormRequest
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
            'dependent.*.pin'                    =>  'sometimes|nullable|numeric|unique:dependents,pin',
            'dependent.*.relationship_id'        =>  'required_with:dependent.*.pin',
            'dependent.*.date_of_birth'          =>  'required_with:dependent.*.pin|nullable|date|before_or_equal:today',
            'dependent.*.first_name'             =>  'required_with:dependent.*.pin',
            'dependent.*.middle_name'            =>  'nullable',
            'dependent.*.last_name'              =>  'required_with:dependent.*.pin',
            'dependent.*.gender_id'              =>  'required_with:dependent.*.pin',
            'dependent.*.religion_id'            =>  'required_with:dependent.*.pin',
            'dependent.*.is_next_on_kin'         =>  'sometimes',
        ];
    }

    public function messages()
    {
        return [
            'dependent.*.pin.numeric'                       =>  'The pin must be a number',
            'dependent.*.pin.unique'                        =>  'The pin provided already exist',
            'dependent.*.relationship_id.required_with'     =>  'Dependent relationship is required',
            'dependent.*.date_of_birth.required_with'       =>  'Dependents date of birth is required',
            'dependent.*.first_name.required_with'          =>  'Dependent first name is required',
            'dependent.*.last_name.required_with'           =>  'Dependent last name is required',
            'dependent.*.gender_id.required_with'           =>  'Dependent gender is required',
            'dependent.*.religion_id.required_with'         =>  'Dependent religion is required',
        ];
    }
}
