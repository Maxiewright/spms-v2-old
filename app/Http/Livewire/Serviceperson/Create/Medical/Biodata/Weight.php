<?php

namespace App\Http\Livewire\Serviceperson\Create\Medical\Biodata;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Weight extends Component
{
    use WithSteps;

    public $weights;

    public function mount()
    {
        $this->weights = \App\Models\System\Serviceperson\Biodata\Weight::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.medical.biodata.weight');
    }
}
