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

    public function mount()
    {
        $this->divisions = DivisionOrRegion::all('name', 'id');
        $this->genders = Gender::all('name', 'id');
    }

    public function render()
    {
        if (isset($this->data['nationalId']['divisionId'])){
            $this->cities = CityOrTown::where('division_or_region_id', $this->data['nationalId']['divisionId'])
                ->get();
        };
        return view('livewire.serviceperson.create.identification.national-id-card');
    }
}
