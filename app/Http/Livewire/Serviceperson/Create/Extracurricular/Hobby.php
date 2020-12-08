<?php

namespace App\Http\Livewire\Serviceperson\Create\Extracurricular;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Extracurricular\HobbyType;
use Livewire\Component;

class Hobby extends Component
{
    use WithSteps, WithDynamicInput;

    public $types;
    public $hobbies = [];

    protected $rules = [
        'data.hobby.type' => 'sometimes',
        'data.hobby.hobby' => 'sometimes'
    ];

    protected $messages = [];

    public function mount()
    {
        $this->types = HobbyType::all('id', 'name');
    }

    public function render()
    {
        if (isset($this->data['hobby']['type'])){
            $this->hobbies = \App\Models\System\Serviceperson\Extracurricular\Hobby::
            where('hobby_type_id', $this->data['hobby']['type'])->get();
        }

        return view('livewire.serviceperson.create.extracurricular.hobby');
    }
}
