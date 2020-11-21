<?php

namespace App\Http\Requests\Manpower;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;


class StoreJobRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'job.*.job_title_id' =>'required|unique:jobs,job_title_id,job_class_id,career_path_id,rank_id,',
            'job.*.job_class_id' => 'sometimes',
            'job.*.career_path_id' => 'required',
            'job.*.rank_id' => 'required',
            'job.*.establishment_total' => 'required',
            'job.*.description' => 'sometimes',
        ];
    }

    public function messages()
    {
        return [
            'job.*.job_title_id.required' => 'A Job Title is required',
            'job.*.job_title_id.unique' => 'This shit is unique',
            'job.*.job_class_id.sometimes' => '',
            'job.*.career_path_id.required' => 'A Career path is required',
            'job.*.rank_id.required' => 'The Substantive Rank is required',
            'job.*.establishment_total.required' => 'The Job establishment is Required',
            'job.*.description.sometimes' => '',
        ];
    }
}
