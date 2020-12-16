<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use App\Models\System\Universal\Lookup\Gender;
use Livewire\Component;

class Identification extends Component
{

    use WithSteps;

    public $nextStep = 4;

    protected $listeners = ['componentsValidated'];

    public function submit()
    {
        $this->emit('validateNationalID');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.identification');
    }
}
