<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Serviceperson\Contact\HasPhoneNumberInput;
use App\Http\Livewire\Serviceperson\Contact\PhoneNumber;
use App\Http\Livewire\Serviceperson\Create\Contact\HasAddress;
use App\Http\Livewire\Serviceperson\Create\Contact\HasPhoneNumber;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Universal\Lookup\EmailType;
use App\Models\System\Universal\Lookup\PhoneType;
use Livewire\Component;

class Contact extends Component
{
    use WithSteps;

    public $nextStep = 3;

    protected $listeners = ['componentsValidated'];

    public function submit()
    {
        $this->emit('validateAddress');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.contact');
    }

}
