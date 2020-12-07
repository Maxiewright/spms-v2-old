<?php

namespace App\Http\Livewire\Serviceperson\Create\Medical\Biodata;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Height extends Component
{
    use WithSteps;

    public $heights;

    public function mount()
    {
        $this->heights = \App\Models\System\Serviceperson\Biodata\Height::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.medical.biodata.height');
    }
}
