<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Rank extends Component
{
    use WithSteps;

    public $ranks;

    public function mount()
    {
        $this->ranks = \App\Models\System\Serviceperson\ServiceData\Rank::all('id', 'regiment_slug');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.service-data.rank');
    }
}
