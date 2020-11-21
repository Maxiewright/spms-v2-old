<?php


namespace App\Services\ContactServices;


use App\Models\Serviceperson\Address;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\PhoneNumber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactService
{

    /**
     * @var Request
     */
    protected $request;
    /**
     * @var Model
     */
    protected $model;

    /**
     * ContactService constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

    }

    private function isPostMethod()
    {
        return $this->request->isMethod('post');
    }

    public function storePhoneNumber($model)
    {
        if ($this->isPostMethod()) {
            $phone = PhoneNumber::firstOrCreate(['number' => $this->request->number]);
            $model->phoneNumbers()
                ->attach($phone->id, ['phone_type_id' => $this->request->phone_type_id]);
        } else {
            $model->phoneNumbers()->update(['number' => $this->request->number]);
            $phone = PhoneNumber::query()->where('number', $this->request->number)->first();
            $model->phoneNumbers()
                ->updateExistingPivot($phone->id, ['phone_type_id' => $this->request->phone_type_id]);
        }
    }


    public function storeEmailAddress($model)
    {
        if ($this->isPostMethod()) {
            $email = EmailAddress::firstOrCreate(['email' => $this->request->email]);
            $model->emailAddresses()
                ->attach($email->id, [
                'email_type_id' => $this->request->email_type_id
            ]);
        } else {
            $model->emailAddresses()->update(['email' => $this->request->email]);
            $email = EmailAddress::query()->where('email', $this->request->email)->first();
            $model->emailAddresses()
                ->updateExistingPivot($email->id, [
                'email_type_id' => $this->request->email_type_id
            ]);
        }

    }

    public function storeAddress($model)
    {
        if ($this->isPostMethod()){
            $address = Address::firstOrCreate([
                'address1' => $this->request->address1,
                'address2' => $this->request->address2,
                'city_or_town_id' => $this->request->city_or_town_id,
            ])->id;
            $model->addresses()->attach($address);

        } else {
            $model->addresses()->update([
                'address1' => $this->request->address1,
                'address2' => $this->request->address2,
                'city_or_town_id' => $this->request->city_or_town_id,
            ]);
        }





    }


}
