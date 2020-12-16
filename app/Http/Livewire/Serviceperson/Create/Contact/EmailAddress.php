<?php

namespace App\Http\Livewire\Serviceperson\Create\Contact;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\EmailType;
use App\Models\System\Universal\Lookup\PhoneType;
use Livewire\Component;

class EmailAddress extends Component
{

    use WithDynamicInput, WithSteps;

    public $types;
    public $isValid = false;
    public $title = 'email';

    protected $rules = [
        'data.email.0.email_type_id' => 'required',
        'data.email.0.email' => 'required',

        'data.email.*.email_type_id' => 'required',
        'data.email.*.email' => 'required|email|unique:email_addresses,email',
    ];

    protected $messages = [
        'data.email.0.email_type_id.required' => 'Please select email type',
        'data.email.0.email.required' => 'An Email Address is required',
        'data.email.0.email.email' => 'Please enter a valid email address',
        'data.email.0.email.unique' => 'The Email already exist',

        'data.email.*.email_type_id.required' => 'Please select email type',
        'data.email.*.email.required' => 'An Email Address is required',
        'data.email.*.email.email' => 'Please enter a valid email address',
        'data.email.*.email.unique' => 'The Email already exist',
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
        return view('livewire.serviceperson.create.contact.email-address');
    }
}
