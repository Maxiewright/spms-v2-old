<?php

namespace App\Http\Livewire\Serviceperson\Create\Medical\History;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Vaccine extends Component
{
    use WithDynamicInput, WithSteps;

    public $vaccines;

    protected $rules = [];

    protected $messages = [];

    public function mount()
    {
        $this->vaccines = Vaccine::all('id', 'name');
    }
    public function render()
    {
        return view('livewire.serviceperson.create.medical.history.vaccine');
    }
}
