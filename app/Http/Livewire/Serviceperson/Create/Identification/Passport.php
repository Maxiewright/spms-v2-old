<?php

namespace App\Http\Livewire\Serviceperson\Create\Identification;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Passport extends Component
{
    use WithSteps;

    protected $rules = [
        'data.passport.number' => 'sometimes|nullable|alpha_num|unique:passports,number',
        'data.passport.issued_on' => 'required_with:passport.number|nullable|before_or_equal:today',
        'data.passport.expired_on' => 'required_with:passport.number|nullable|after:today',
    ];

    protected $messages = [
        'data.passport.number.unique' => 'This passport already exist',
        'data.passport.number.alpha_num' => 'Passport must contain letters and numbers',
        'data.passport.issued_on.required_with' => 'Issue date required',
        'data.passport.issued_on.before_or_equal' => 'The issue date cannot be a future date',
        'data.passport.expired_on.required_with' => 'Expiry date required',
        'data.passport.expired_on.after' => 'The expiry date must be a date after today',
    ];

    protected $listeners = ['validatePassport'];

    public function validatePassport()
    {
        $this->validate();

        $this->emit('componentsValidated');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.identification.passport');
    }
}
