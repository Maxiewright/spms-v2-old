<?php

namespace App\Http\Livewire\Serviceperson\Contact;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Universal\Lookup\PhoneType;
use Livewire\Component;

class PhoneNumber extends Component
{
    use WithDynamicInput, WithSteps;

    public $types;

    public function mount()
    {
        $this->types = PhoneType::all('id', 'name');
    }

    public function remove($index)
    {
        $this->emit('removeData', 'phone', $index);
        unset($this->data['phone'][$index + 1]);
        unset($this->inputs[$index]);
        $this->inputs = array_values($this->inputs);
    }

    public function render()
    {
        return view('livewire.serviceperson.contact.phone-number');
    }
}
