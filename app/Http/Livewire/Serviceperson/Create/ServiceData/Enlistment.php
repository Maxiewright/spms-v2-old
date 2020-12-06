<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\ServiceData\EngagementPeriod;
use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use Livewire\Component;

class Enlistment extends Component
{
    use WithSteps;

    public $types;
    public $periods;

    public function mount()
    {
        $this->types = EnlistmentType::all('id', 'name');
        $this->periods = EngagementPeriod::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.service-data.enlistment');
    }
}
