<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\ServiceData\EngagementPeriod;
use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use Livewire\Component;

class Enlistment extends Component
{
    use WithSteps;

    public $types;
    public $periods;

    protected $rules = [
        'data.enlistment.*.enlistment_type_id'   =>  'required',
        'data.enlistment.*.date'                 =>  'required|date|before_or_equal:today',
        'data.enlistment.*.engagement_period_id' =>  'required',
    ];

    protected $messages = [
        'data.enlistment.*.enlistment_type_id.required'      =>  'Enlistment data is required',
        'data.enlistment.*.date.required'                    =>  'Enlistment date is required',
        'data.enlistment.*.engagement_period_id.required'    =>  'Engagement Period is required',
    ];

    protected $listeners = ['validateEnlistment'];

    public function validateEnlistment()
    {
        $this->validate();

        $this->emit('validateDecoration');
    }

    public function mount()
    {
        $this->types = EnlistmentType::all('id', 'name');
        $this->periods = EngagementPeriod::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.service-data.enlistment');
    }
}
