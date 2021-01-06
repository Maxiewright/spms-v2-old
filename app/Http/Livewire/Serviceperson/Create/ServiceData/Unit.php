<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Unit\Battalion;
use App\Models\System\Serviceperson\Unit\Company;
use App\Models\System\Serviceperson\Unit\Platoon;
use App\Models\System\Serviceperson\Unit\Section;
use Livewire\Component;

class Unit extends Component
{
    use WithSteps, WithDynamicInput;

    public $battalions;
    public $companies = [];
    public $platoons = [];
    public $sections;
    public $title = 'unit';

    protected $rules = [
        'data.unit.0.company_id' => 'required',
        'data.unit.0.joined_on' => 'required|date|before_or_equal:today',
        'data.unit.0.left_on' => 'sometimes|nullable|date|after:unit.*.joined_on',
    ];

    protected $messages = [
        'data.unit.*.company_id.required' => 'Company is required',
        'data.unit.*.joined_on.required' => 'Date joined is required',
        'data.unit.*.joined_on.before_or_equal' => 'Date Joined cannot be a future date',
        'data.unit.*.left_on.after' => 'Date left cannot be before date joined',
    ];

    protected $listeners = ['validateUnit'];

    public function validateUnit()
    {
        $this->validate();

        $this->emit('validateJob');
    }

    public function mount()
    {
        $this->battalions = Battalion::all('id', 'name');
        $this->sections = Section::all('id', 'name');
        $this->inputs[] = 1;
    }

    public function render()
    {
        if (isset($this->data['unit'][0]['battalion_id'])) {
            $this->companies = Company::where('battalion_id', $this->data['unit'][0]['battalion_id'])->get();
        }
        if (isset($this->data['unit'][0]['company_id'])) {
            $this->platoons = Platoon::where('company_id', $this->data['unit'][0]['company_id'])->get();
        }

        return view('livewire.serviceperson.create.service-data.unit');
    }
}
