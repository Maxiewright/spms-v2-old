<?php

namespace App\Http\Livewire\Serviceperson\Create\Medical;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Biodata\BloodType;
use App\Models\System\Serviceperson\Biodata\EyeColour;
use App\Models\System\Serviceperson\Biodata\HairColour;
use App\Models\System\Serviceperson\Biodata\SkinColour;
use Livewire\Component;

class BioData extends Component
{
    use WithSteps;

    public $eyeColours;
    public $hairColours;
    public $skinColours;
    public $bloodTypes;

    public function mount()
    {
        $this->eyeColours = EyeColour::all('id', 'name');
        $this->hairColours = HairColour::all('id', 'name');
        $this->skinColours = SkinColour::all('id', 'name');
        $this->bloodTypes = BloodType::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.medical.bio-data');
    }
}
