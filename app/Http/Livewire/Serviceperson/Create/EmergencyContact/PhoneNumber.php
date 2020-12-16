<?php

namespace App\Http\Livewire\Serviceperson\Create\EmergencyContact;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\PhoneType;
use Livewire\Component;

class PhoneNumber extends Component
{
    use WithDynamicInput, WithSteps;

    public $types;
    public $isValid = false;

    protected $rules = [
        'data.emergency_contact_phone.0.type' => 'required',
        'data.emergency_contact_phone.0.number' => 'required',
        'data.emergency_contact_phone.*.type' => 'required',
        'data.emergency_contact_phone.*.number' => 'required',
    ];

    protected $messages = [
        'data.emergency_contact_phone.0.type.required' => 'Please select emergency_contact_phone type',
        'data.emergency_contact_phone.0.number.required' => 'Phone number is required',
        'data.emergency_contact_phone.*.type.required' => 'Please select emergency_contact_phone type',
        'data.emergency_contact_phone.*.number.required' => 'Phone number is required',
    ];

    protected $listeners = ['validatePhoneNumber'];

    public function validatePhoneNumber()
    {
        $this->validate();

        $this->emit('validateEmailAddress');
    }

    public function mount()
    {
        $this->types = PhoneType::all('id', 'name');
    }

    public function render()
    {
        return view('livewire.serviceperson.create.emergency-contact.phone-number');
    }
}
