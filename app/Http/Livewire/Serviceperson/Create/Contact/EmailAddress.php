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
    public $dimension;
    public $isValid = false;

    protected $rules = [
        'data.email.0.type' => 'required',
        'data.email.0.address' => 'required',
        'data.email.*.type' => 'required',
        'data.email.*.address' => 'required',
    ];

    protected $messages = [
        'data.email.0.type.required' => 'Please select email type',
        'data.email.0.address.required' => 'Phone number is required',
        'data.email.*.type.required' => 'Please select email type',
        'data.email.*.address.required' => 'Phone number is required',
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

    public function remove($index)
    {
        $this->emit('removeData', 'email', $index);
        unset($this->data['email'][$index + 1]);
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }

    public function render()
    {
        return view('livewire.serviceperson.create.contact.email-address');
    }
}
