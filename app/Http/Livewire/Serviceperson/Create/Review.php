<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Review extends Component
{
    use WithSteps;
    public function store()
    {

    }

    public function render()
    {
        return view('livewire.serviceperson.create.review');
    }
}
