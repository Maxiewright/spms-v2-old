<?php

namespace App\Http\Livewire\Serviceperson\Create\Identification;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Passport extends Component
{
    use WithSteps;

    public function render()
    {
        return view('livewire.serviceperson.create.identification.passport');
    }
}
