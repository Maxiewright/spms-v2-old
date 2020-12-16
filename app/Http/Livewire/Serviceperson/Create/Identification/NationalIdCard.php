<?php

namespace App\Http\Livewire\Serviceperson\Create\Identification;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Universal\Lookup\Gender;
use Livewire\Component;

class NationalIdCard extends Component
{
    use WithSteps;

    public $divisions;
    public $genders;
    public $cities = [];

    protected $rules = [
        'data.national_id.number' => 'required|numeric|digits:11|unique:national_id_cards,number',
        'data.national_id.date_of_birth' => 'required|date|before_or_equal:tomorrow',
        'data.national_id.place_of_birth' => 'required',
        'data.national_id.gender_id' => 'required',
        'data.national_id.issued_on' => 'required|date|before_or_equal:tomorrow',
        'data.national_id.expired_on' => 'required|date|after:today',
    ];

    protected $messages = [
        'data.national_id.number.required' => 'ID Card Number required',
        'data.national_id.number.numeric' => 'Must be a number',
        'data.national_id.number.digits' => 'ID Card Number must be 11 digits',
        'data.national_id.number.unique' => 'This ID Card Number already exist',
        'data.national_id.date_of_birth.required' => 'Date of birth is required',
        'data.national_id.date_of_birth.before_or_equal' => 'This date of birth cannot be after today',
        'data.national_id.place_of_birth.required' => 'Place of birth is required',
        'data.national_id.gender_id.required' => 'Gender is required',
        'data.national_id.issued_on.required' => 'Issue date is required',
        'data.national_id.issued_on.before_or_equal' => 'Cannot be a future date',
        'data.national_id.expired_on.required' => 'Expiry date is required',
        'data.national_id.expired_on.after' => 'Must be a date after today',
    ];

//    public function updatedData()
//    {
//        $this->validateOnly('data.national_id.number');
//    }

    protected $listeners = ['validateNationalID'];

    public function validateNationalID()
    {
        $this->validate();

        $this->emit('validateDriversPermit');
    }

    public function mount()
    {
        $this->divisions = DivisionOrRegion::all('name', 'id');
        $this->genders = Gender::all('name', 'id');
    }

    public function render()
    {
        if (isset($this->data['national_id']['place_of_birth_division'])) {
            $this->cities = CityOrTown::where('division_or_region_id', $this->data['national_id']['place_of_birth_division'])
                ->get();
        };
        return view('livewire.serviceperson.create.identification.national-id-card');
    }
}
