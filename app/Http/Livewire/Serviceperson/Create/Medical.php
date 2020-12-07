<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Medical extends Component
{
    use WithSteps;

    public $nextStep = 6;

    protected $listeners = ['componentsValidated'];

    public function submit()
    {
        $this->emit('validateBiodata');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.medical');
    }
}
