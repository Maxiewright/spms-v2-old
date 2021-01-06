<?php

namespace App\Http\Livewire\Serviceperson\Create\Identification;

use App\Http\Livewire\Traits\WithDynamicInput;
use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use Livewire\Component;

class DriversPermit extends Component
{

    use WithDynamicInput, WithSteps;

    public $types;
    public $classes;
    public $codes;
    public $title = 'drivers_permit';

    protected $rules = [
        'data.drivers_permit.*.number' => [
            'required_with:data.drivers_permit.*.drivers_permit_type_id',
            'required_with:data.drivers_permit.*.drivers_permit_class_id',
            'required_with:data.drivers_permit.*.drivers_permit_transaction_code_id',
            'required_with:data.drivers_permit.*.issued_on',
            'required_with:data.drivers_permit.*.expired_on',
            'nullable',
            'numeric',
            'unique:drivers_permits,number',
        ],
        'data.drivers_permit.*.drivers_permit_type_id' => 'required_with:data.drivers_permit.*.number',
        'data.drivers_permit.*.drivers_permit_class_id' => 'required_with:data.drivers_permit.*.number',
        'data.drivers_permit.*.drivers_permit_transaction_code_id' => 'required_with:data.drivers_permit.*.number',
        'data.drivers_permit.*.issued_on' => 'required_with:data.drivers_permit.*.number|nullable|date|before_or_equal:today',
        'data.drivers_permit.*.expired_on' => 'required_with:data.drivers_permit.*.number|nullable|date|after:today',
    ];


    protected $messages = [
        'data.drivers_permit.*.number.numeric' => 'Drivers Permit must be a number',
        'data.drivers_permit.*.number.unique' => 'This Drivers Permit number already exist',
        'data.drivers_permit.*.number.required_with' => 'DP number required when other DP fields are present',
        'data.drivers_permit.*.drivers_permit_type_id.required_with' => 'Drivers permit type is required',
        'data.drivers_permit.*.drivers_permit_class_id.required_with' => 'Drivers permit class is required',
        'data.drivers_permit.*.drivers_permit_transaction_code_id.required_with' => 'Drivers permit Code is required',
        'data.drivers_permit.*.issued_on.required_with' => 'An issue date is required',
        'data.drivers_permit.*.issued_on.before_or_equal' => 'The issue date cannot be a future date',
        'data.drivers_permit.*.expired_on.required_with' => 'An expiry date is required',
        'data.drivers_permit.*.expired_on.after' => 'The expiry date must be a date after today',
    ];

    protected $listeners = ['validateDriversPermit'];

    public function validateDriversPermit()
    {
        $this->validate();
        $this->emit('validateMilitaryId');
    }

    public function mount()
    {
        $this->types = DriversPermitType::all('id', 'name');
        $this->classes = DriversPermitClass::all('id', 'name');
        $this->codes = DriversPermitTransactionCode::all('id', 'name');
        $this->inputs[] = 1;
    }

    public function render()
    {
        return view('livewire.serviceperson.create.identification.drivers-permit');
    }
}
