<?php

namespace App\Http\Livewire\Serviceperson\Create\Medical\History;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Medical\AllergyType;
use Livewire\Component;

class Allergy extends Component
{
    use WithDynamicInput, WithSteps;

    public $types;

    public $allergies = [];

    protected $rules = [];

    protected $messages = [];

    public function mount()
    {
        $this->types = AllergyType::all('id', 'name');
    }

    public function render()
    {
        if (isset($this->data['allergy']['type'])){
            $this->allergies = Allergy::where('allergy_type_id', $this->data['allergy']['type']);
        }

        return view('livewire.serviceperson.create.medical.history.allergy');
    }
}
