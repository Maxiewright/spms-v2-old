<?php

namespace App\Http\Livewire\Serviceperson\Create\Identification;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class MilitaryIdCard extends Component
{
    use WithSteps;

    protected $rules = [
        'data.military_id.number' => 'required|numeric|unique:military_id_cards,number',
        'data.military_id.issued_on' => 'required|date|before_or_equal:today',
        'data.military_id.expired_on' => 'required|date|after:military_id.issued_on|after:today',
    ];

    protected $messages = [
        'data.military_id.number.required' => 'A Military ID card is required',
        'data.military_id.number.numeric' => 'Must be a number',
        'data.military_id.number.unique' => 'This Military ID card already exist',
        'data.military_id.issued_on.required' => 'An issue date is required',
        'data.military_id.issued_on.before_or_equal' => 'The issue date cannot be a future date',
        'data.military_id.expired_on.required' => 'An expiry date is required',
        'data.military_id.expired_on.after' => 'The expiry date must be a date after today',
    ];

    protected $listeners = ['validateMilitaryId'];

    public function validateMilitaryId()
    {
        $this->validate();
        $this->emit('validatePassport');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.identification.military-id-card');
    }
}
