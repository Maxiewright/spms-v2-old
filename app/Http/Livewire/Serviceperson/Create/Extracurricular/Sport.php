<?php

namespace App\Http\Livewire\Serviceperson\Create\Extracurricular;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Extracurricular\SportType;
use Livewire\Component;

class Sport extends Component
{
    use WithSteps, WithDynamicInput;

    public $types;
    public $sports = [];
    protected $rules = [
        'data.sport.type' => 'sometimes',
        'data.sport.sport' => 'sometimes'
    ];
    protected $messages = [];

    public function mount()
    {
        $this->types = SportType::all('id', 'name');
    }

    public function render()
    {
        if (isset($this->data['sport']['type'])){
            $this->sports = \App\Models\System\Serviceperson\Extracurricular\Sport::
            where('sport_type_id', $this->data['sport']['type'])->get();
        }

        return view('livewire.serviceperson.create.extracurricular.sport');
    }
}
