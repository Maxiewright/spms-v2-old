<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\Relationship;
use App\Models\System\Universal\Lookup\Religion;
use Livewire\Component;
use Livewire\WithFileUploads;

class Dependents extends Component
{

    use WithFileUploads, WithSteps, WithDynamicInput;

    public $nextStep = 2;
    public $photo;
    public $relationships;
    public $genders;
    public $religions ;

    protected $rules = [

    ];

    protected $messages = [

    ];

    public function mount()
    {
        $this->relationships = Relationship::all('id', 'name');
        $this->genders = Gender::all('id', 'name');
        $this->religions = Religion::all('id', 'name');
    }


    public function render()
    {
        return view('livewire.serviceperson.create.dependents');
    }
}
