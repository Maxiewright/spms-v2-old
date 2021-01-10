<?php

namespace App\Http\Livewire\Serviceperson\Create\ServiceData;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Rank extends Component
{
    use WithSteps, WithDynamicInput;

    public $ranks;
    public $title = 'rank';

    protected $rules = [
        'data.rank.0.rank_id' => 'required',
        'data.rank.0.promoted_on' => 'required|date|before_or_equal:today',
    ];

    protected $messages = [
        'data.rank.*.rank_id.required' => 'Rank is required',
        'data.rank.*.promoted_on.required' => 'Promotion date required',
        'data.rank.*.promoted_on.before_or_equal' => 'The promotion date cannot be a future date',
    ];

    protected $listeners = ['validateRank'];

    public function validateRank()
    {
        $this->validate();

        $this->emit('validateUnit');
    }

    public function mount()
    {
        $this->ranks = \App\Models\System\Serviceperson\ServiceData\Rank::all('id', 'regiment_slug');

        $this->inputs[] = 1;
    }

    public function render()
    {
        return view('livewire.serviceperson.create.service-data.rank');
    }
}
