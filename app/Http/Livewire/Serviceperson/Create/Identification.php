<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use App\Models\System\Universal\Lookup\Gender;
use Livewire\Component;

class Identification extends Component
{

    public $data = [];

    public $divisions ;
    public $genders ;
    public $driversPermitTypes ;
    public $driversPermitClasses ;
    public $driversPermitTransactionCodes ;

    protected $rules = [
      'data.thing' => 'required'
    ];

    public function mount()
    {
        $this->divisions = DivisionOrRegion::all()->pluck('name', 'id');
        $this->genders = Gender::all()->pluck('name', 'id');
        $this->driversPermitTypes = DriversPermitType::all()->pluck('name', 'id');
        $this->driversPermitClasses = DriversPermitClass::all()->pluck('name','id');
        $this->driversPermitTransactionCodes = DriversPermitTransactionCode::all()->pluck('name','id');
    }

    public function updatedData()
    {
        $this->emit('mergeData', $this->data);
    }

    public function submit()
    {
        $this->validate();

        $this->emit('store');
    }


    public function render()
    {
        return view('livewire.serviceperson.create.identification');
    }
}
