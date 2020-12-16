<?php

namespace App\Http\Livewire\Serviceperson\Create\EmergencyContact;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\Relationship;
use Livewire\Component;

class BasicInfo extends Component
{
    use WithSteps;

    public $relationships;
    public $genders;

    public function mount()
    {
        $this->relationships = Relationship::all('id', 'name');
        $this->genders = Gender::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.emergency-contact.basic-info');
    }
}
