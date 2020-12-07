<?php

namespace App\Http\Livewire\Serviceperson\Create\Medical\History;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class MedicalCondition extends Component
{
    use WithDynamicInput, WithSteps;

    public $medicalConditions;

    protected $rules = [];

    protected $messages = [];

    public function mount()
    {
        $this->medicalConditions = MedicalCondition::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.medical.history.medical-condition');
    }
}
