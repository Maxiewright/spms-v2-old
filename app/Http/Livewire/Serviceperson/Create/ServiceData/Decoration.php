<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Decoration extends Component
{
    use WithSteps;

    public $decorations;

    public function mount()
    {
        $this->decorations = \App\Models\System\Serviceperson\ServiceData\Decoration::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.service-data.decoration');
    }
}
