<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Rank extends Component
{
    use WithSteps;

    public $ranks;

    protected $rules = [
        'data.rank.*.rank_id' => 'required',
        'data.rank.*.promoted_on' => 'required|date|before_or_equal:today',
    ];

    protected $messages = [
        'data.rank.*.rank_id.required' => 'Promotion information is required',
        'data.rank.*.promoted_on.required' => 'Promotion date is required',
        'data.rank.*.promoted_on.before_or_equal' => 'The promotion date cannot be a future date',
    ];

    protected $listeners = ['validateRank'];

    public function validateRank()
    {
        $this->validate();

        $this->emit('validateEnlistment');
    }

    public function mount()
    {
        $this->ranks = \App\Models\System\Serviceperson\ServiceData\Rank::all('id', 'regiment_slug');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.service-data.rank');
    }
}
