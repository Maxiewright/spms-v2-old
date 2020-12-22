<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class ServiceData extends Component
{
    use WithSteps;

    public $nextStep = 5;

    protected $listeners = ['componentsValidated'];

    public function submit()
    {
        $this->emit('validateUnit');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.service-data');
    }
}
