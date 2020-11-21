<?php

namespace App\Http\Requests\Serviceperson\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServicepersonPhoneRequest extends FormRequest
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
            'phone_type_id'  =>  [
                'required',
                Rule::unique('phone_numberables', 'phone_type_id')->where(function ($q){
                    $q->where('phone_numberable_id', $this->request->get('serviceperson_number'));
                })
            ],
            'number'         =>  'required|regex:/^([0-9]-?){7}$/',
        ];
    }

    public function messages()
    {
        return [
            'phone_type_id.required'      =>  'A Phone type is required',
            'phone_type_id.unique'        =>  'This serviceperson already has this phone type on file',
            'number.required'             =>  'The Phone field cannot be blank',
            'number.unique'               =>  'The Phone number already exist',
            'number.phone'                =>  'A Valid T&T Number is required.',
        ];
    }
}
