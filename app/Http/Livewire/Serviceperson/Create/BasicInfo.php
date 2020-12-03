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
    public $photo;
    public $ethnicities;
    public $religions ;
    public $maritalStatuses;

    protected $rules = [
        'data.serviceperson.number' => 'required|numeric'
    ];

    protected $messages = [
        'data.serviceperson.number.required' => 'A service number is required',
        'data.serviceperson.number.numeric' => 'This must be a number'
    ];

    public function mount(PhotoService $photoService)
    {
//        $this->photoService = $photoService;
        $this->ethnicities = Ethnicity::all('name', 'id');
        $this->religions = Religion::all('name', 'id');
        $this->maritalStatuses = MaritalStatus::all('name', 'id');
    }


    public function render()
    {
        return view('livewire.serviceperson.create.basic-info');
    }
}
