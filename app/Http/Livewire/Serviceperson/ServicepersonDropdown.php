<?php

namespace App\Http\Livewire\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use Livewire\Component;

class ServicepersonDropdown extends Component
{

    public $search = '';
    public $selectedServicepersonNumber = null;

    public function render()
    {
        if ($this->selectedServicepersonNumber) $this->search = '';

        return view('livewire.serviceperson.serviceperson-dropdown', [
            'servicepeople' =>  $servicepeople = $this->search
                ? Serviceperson::query()
                    ->where('number', 'LIKE', '%'. $this->search . '%')
                    ->orWhere('first_name', 'LIKE', '%'. $this->search . '%')
                    ->orWhere('middle_name', 'LIKE', '%'. $this->search . '%')
                    ->orWhere('last_name', 'LIKE', '%'. $this->search . '%')
                    ->get()
                : [],

            'noResults' => $this->search && $servicepeople->isEmpty(),

            'selectedServiceperson' => Serviceperson::find($this->selectedServicepersonNumber)
        ])
            ->extends('layouts.master')
            ->section('content');
    }
}
