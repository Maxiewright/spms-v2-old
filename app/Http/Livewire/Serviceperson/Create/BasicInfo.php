<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\Ethnicity;
use App\Models\System\Universal\Lookup\MaritalStatus;
use App\Models\System\Universal\Lookup\Religion;
use App\Services\FileServices\PhotoService;
use Livewire\Component;
use Livewire\WithFileUploads;

class BasicInfo extends Component
{
    use WithFileUploads, WithSteps;

    public $nextStep = 2;
    public $ethnicities;
    public $religions ;
    public $maritalStatuses;

    protected $rules = [
        'data.serviceperson.photo'                 =>  'required|image|max:1024',
        'data.serviceperson.number'                =>  'required|numeric|digits_between:3,5|unique:servicepeople,number',
        'data.serviceperson.first_name'            =>  'required',
        'data.serviceperson.last_name'             =>  'required',
        'data.serviceperson.marital_status_id'     =>  'required',
        'data.serviceperson.religion_id'           =>  'required',
        'data.serviceperson.ethnicity_id'          =>  'required',
    ];

    protected $messages = [
        'data.serviceperson.photo.required' => 'A Photo is required',
        'data.serviceperson.number.unique' => 'Service number already exist',
        'data.serviceperson.number.numeric' => 'This field must be a number',
        'data.serviceperson.number.required' => 'Service Number is required',
        'data.serviceperson.number.digits_between' => 'The Service Number must be between 3 and 5 digits',
        'data.serviceperson.first_name.required' => 'First name is required',
        'data.serviceperson.last_name.required' => 'Last name is required',
        'data.serviceperson.marital_status_id.required' => 'Marital Status is required',
        'data.serviceperson.religion_id.required' => 'Religion is required',
        'data.serviceperson.ethnicity_id.required' => 'Ethnicity is required',
    ];

//    public function updatedData()
//    {
//        $this->validateOnly('data.serviceperson.number');
//    }

    public function mount()
    {
        $this->ethnicities = Ethnicity::all('name', 'id');
        $this->religions = Religion::all('name', 'id');
        $this->maritalStatuses = MaritalStatus::all('name', 'id');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.basic-info');
    }
}
