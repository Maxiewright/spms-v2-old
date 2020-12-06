<?php

namespace App\Http\Livewire\Serviceperson\Create\Contact;


use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Universal\Lookup\EmailType;
use App\Models\System\Universal\Lookup\PhoneType;
use Livewire\Component;

class Address extends Component
{
    use WithSteps;

    public $cities = [];
    public $divisions;

    protected $listeners = ['validateAddress'];

    protected $rules = [
        'data.address.address1' =>  'required',
        'data.address.city'   =>  'required',
    ];

    protected $messages = [
        'data.address.address1.required' => 'A House/Apartment number or location is required.',
        'data.address.city.required' => 'The City or Town is required.',
    ];

    public function validateAddress()
    {
        $this->validate();

        $this->emit('validatePhoneNumber');
    }

    public function mount()
    {
        $this->divisions = DivisionOrRegion::all('name', 'id');
    }

    public function render()
    {
        if (isset($this->data['address']['division'])){
            $this->cities = CityOrTown::where('division_or_region_id', $this->data['address']['division'])
                ->get();
        };

        return view('livewire.serviceperson.create.contact.address');
    }
}
