<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Decoration extends Component
{
    use WithSteps;

    public $decorations;

    protected $rules = [
        'data.decoration.0.decoration_id'   => 'nullable',
        'data.decoration.0.received_on'     => 'required_with:decoration.*.decoration_id|before_or_equal:today',
    ];

    protected $messages = [
        'data.decoration.*.received_on.required_with'    => 'Date required',
        'data.decoration.*.received_on.before_or_equal'  => 'The award receipt date cannot be a future date',
    ];

    protected $listeners = ['validateDecoration'];

    public function validateDecoration()
    {
        $this->validate();

        $this->emit('componentsValidated');
    }

    public function mount()
    {
        $this->decorations = \App\Models\System\Serviceperson\ServiceData\Decoration::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.service-data.decoration');
    }
}
