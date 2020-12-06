<?php

namespace App\Http\Livewire\Serviceperson\Create\Identification;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use Livewire\Component;

class DriversPermit extends Component
{

    use WithDynamicInput, WithSteps;

    public $types;
    public $classes;
    public $codes;

    protected $rules = [

    ];

    protected $messages = [

    ];

    protected $listeners = ['validateMilitaryID'];

    public function validateMilitaryId()
    {
        $this->validate();

        $this->emit('validatePassport');
    }

    public function mount()
    {
        $this->types = DriversPermitType::all('id', 'name');
        $this->classes = DriversPermitClass::all('id', 'name');
        $this->codes = DriversPermitTransactionCode::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.identification.drivers-permit');
    }
}
