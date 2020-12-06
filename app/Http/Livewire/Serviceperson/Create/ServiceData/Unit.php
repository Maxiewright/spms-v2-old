<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Unit\Battalion;
use App\Models\System\Serviceperson\Unit\Company;
use App\Models\System\Serviceperson\Unit\Platoon;
use App\Models\System\Serviceperson\Unit\Section;
use Livewire\Component;

class Unit extends Component
{
    use WithSteps;

    public $battalions;
    public $companies = [];
    public $platoons = [];
    public $sections;

    public function mount()
    {
        $this->battalions = Battalion::all('id', 'name');
        $this->sections = Section::all('id', 'name');
    }

    public function render()
    {
        if (isset($this->data['unit']['battalion'])){
            $this->companies = Company::where('battalion_id', $this->data['unit']['battalion'])->get();
        }
        if (isset($this->data['unit']['company'])){
            $this->platoons = Platoon::where('company_id', $this->data['unit']['company'])->get();
        }

        return view('livewire.serviceperson.create.service-data.unit');
    }
}
