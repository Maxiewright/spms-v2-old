<?php

namespace App\Http\Livewire\Serviceperson;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class CreateServicepersonComponent extends Component
{

    public $step = 2;

    public $data = [];

    protected $listeners = [
        'goToStep',
        'mergeData',
        'store'
    ];

    public function mergeData($data)
    {
        $this->data = array_merge($this->data, $data);
    }

    public function store()
    {
        dd($this->data);
    }

    public function goToStep($step)
    {
        $this->step = $step;
    }


    public function render()
    {
        return view('livewire.serviceperson.create-serviceperson-component');
    }
}
