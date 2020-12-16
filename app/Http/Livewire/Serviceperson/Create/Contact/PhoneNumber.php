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
    public $isValid = false;
    public $title = 'phone';

    protected $rules = [
        'data.phone.0.phone_type_id'     =>  'required',
        'data.phone.0.number'            =>  'required|regex:/^([0-9]-?){7}$/',
        'data.phone.*.phone_type_id'     =>  'required',
        'data.phone.*.number'            =>  'required|regex:/^([0-9]-?){7}$/',

    ];

    protected $messages = [
        'data.phone.0.phone_type_id.required' => 'Please select phone type',
        'data.phone.0.number.required' => 'Phone number is required',
        'data.phone.*.phone_type_id.required' => 'Please select phone type',
        'data.phone.*.number.required' => 'Phone number is required',
        'data.phone.*.number.regex'   =>  'Please enter a valid TT phone number e.g 123-4567',
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
