<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\Relationship;
use Livewire\Component;

class EmergencyContact extends Component
{

    use WithSteps;

    public $nextStep = 10;

    protected $listeners = ['componentsValidated'];

    public function submit()
    {
        $this->emit('validateBasicInfo');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.emergency-contact');
    }
}
