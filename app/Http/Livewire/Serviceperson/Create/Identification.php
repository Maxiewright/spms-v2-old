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

    public function render()
    {
        return view('livewire.serviceperson.create.identification');
    }
}
