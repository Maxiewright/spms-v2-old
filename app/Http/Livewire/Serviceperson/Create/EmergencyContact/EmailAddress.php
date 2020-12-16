<?php

namespace App\Http\Livewire\Serviceperson\Create\EmergencyContact;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\EmailType;
use Livewire\Component;

class EmailAddress extends Component
{
    use WithDynamicInput, WithSteps;

    public $types;
    public $dimension = 'emergency_contact_email' ;

    protected $rules = [
        'data.emergency_contact_email.0.type' => 'required',
        'data.emergency_contact_email.0.address' => 'required',
        'data.emergency_contact_email.*.type' => 'required',
        'data.emergency_contact_email.*.address' => 'required',
    ];

    protected $messages = [
        'data.emergency_contact_email.0.type.required' => 'Please select emergency_contact_email type',
        'data.emergency_contact_email.0.address.required' => 'Phone number is required',
        'data.emergency_contact_email.*.type.required' => 'Please select emergency_contact_email type',
        'data.emergency_contact_email.*.address.required' => 'Phone number is required',
    ];

    protected $listeners = ['validateEmailAddress'];

    public function validateEmailAddress()
    {
        $this->validate();

        $this->emit('componentsValidated');
    }

    public function mount()
    {
        $this->types = EmailType::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.emergency-contact.email-address');
    }
}
