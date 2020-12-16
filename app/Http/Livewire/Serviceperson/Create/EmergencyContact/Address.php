<?php

namespace App\Http\Livewire\Serviceperson\Create\EmergencyContact;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use Livewire\Component;

class Address extends Component
{
    use WithSteps;

    public $cities = [];
    public $divisions;

    protected $listeners = ['validateAddress'];

    protected $rules = [
        'data.emergency_contact_address.address1' =>  'required',
        'data.emergency_contact_address.city'   =>  'required',
    ];

    protected $messages = [
        'data.emergency_contact_address.address1.required' => 'A House/Apartment number or location is required.',
        'data.emergency_contact_address.city.required' => 'The City or Town is required.',
    ];

    public function validateEmergencyContactAddress()
    {
        $this->validate();

        $this->emit('validateEmergencyContactPhoneNumber');
    }

    public function mount()
    {
        $this->divisions = DivisionOrRegion::all('name', 'id');
    }

    public function render()
    {
        if (isset($this->data['emergency_contact_address']['division'])){
            $this->cities = CityOrTown::where('division_or_region_id', $this->data['emergency_contact_address']['division'])
                ->get();
        };

        return view('livewire.serviceperson.create.emergency-contact.address');
    }
}
