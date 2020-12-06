<?php

namespace App\Http\Livewire\Serviceperson\Create\Contact;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\PhoneType;
use Livewire\Component;

class PhoneNumber extends Component
{
    use WithDynamicInput, WithSteps;

    public $types;
    public $dimension;
    public $isValid = false;

    protected $rules = [
        'data.phone.0.type' => 'required',
        'data.phone.0.number' => 'required',
        'data.phone.*.type' => 'required',
        'data.phone.*.number' => 'required',
    ];

    protected $messages = [
        'data.phone.0.type.required' => 'Please select phone type',
        'data.phone.0.number.required' => 'Phone number is required',
        'data.phone.*.type.required' => 'Please select phone type',
        'data.phone.*.number.required' => 'Phone number is required',
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
        return view('livewire.serviceperson.create.contact.phone-number');
    }
}
