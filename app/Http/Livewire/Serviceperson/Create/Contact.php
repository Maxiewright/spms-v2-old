<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithSteps;
use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Universal\Lookup\EmailType;
use App\Models\System\Universal\Lookup\PhoneType;
use Livewire\Component;

class Contact extends Component
{
    use WithSteps;

    public $data = [];
    // Address
    public $address1, $address2;
    public $cities = [];
    public $cityId;
    public $divisions, $divisionId;
    // Phone
    public $phone = 1;
    public $phoneInputs = [];
    public $phoneTypes, $phoneTypeId, $phoneNumber;
    // Email
    public $email = 1;
    public $emailInputs = [];
    public $emailTypes,$emailTypeId,$emailAddress;

    protected $rules = [
        'data.address.address1' =>  'required',
        'data.address.cityId'   =>  'required',
//        'phone.*.phone_type_id'     =>  'required',
//        'phone.*.number'            =>  'required|regex:/^([0-9]-?){7}$/',
//        'email.*.email_type_id'     =>  'required',
//        'email.*.email'             =>  'required|email',
    ];

    protected $messages = [
        'data.address.address1.required' => 'A House/Apartment number or location is required.',
        'data.address.cityId.required' => 'The City or Town is required.',
    ];



    /**
     * Add phone field
     * @param $phone
     */
    public function addPhone($phone)
    {
        $phone = $phone + 1;
        $this->phone = $phone;
        array_push( $this->phoneInputs ,$phone);
    }

    /**
     * Remove phone field
     * @param $phone
     */
    public function removePhone($phone)
    {
        unset($this->phoneInputs[$phone]);
    }

    /**
     * Add email field
     * @param $email
     */
    public function addEmail($email)
    {
        $email = $email + 1;
        $this->email = $email;
        array_push($this->emailInputs, $email);
    }

    /**
     * Remove email field
     * @param $email
     */
    public function removeEmail($email)
    {
        unset($this->emailInputs[$email]);
    }

    public function mount()
    {
        $this->divisions = DivisionOrRegion::all('name', 'id');
        $this->phoneTypes = PhoneType::all('name', 'id');
        $this->emailTypes = EmailType::all('name', 'id');
    }

    public function render()
    {
        if (isset($this->data['divisionId'])){
            $this->cities = CityOrTown::where('division_or_region_id', $this->data['divisionId'])
                ->get();
        };
        return view('livewire.serviceperson.create.contact');
    }

    public function updatedData()
    {
        $this->emit('mergeData', $this->data);
    }

    public function submit()
    {
        $this->validate();

        $this->emit('goToStep', 3);
    }
}
