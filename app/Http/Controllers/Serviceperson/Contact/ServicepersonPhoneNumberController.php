<?php

namespace App\Http\Controllers\Serviceperson\Contact;

use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\PhoneNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Contact\StoreServicepersonPhoneRequest;
use App\Models\System\Universal\Lookup\PhoneType;


class ServicepersonPhoneNumberController extends Controller
{
    protected $serviceperson;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });
    }

    public function create()
    {
        $this->authorize('create', PhoneNumber::class);

        $phone_types = PhoneType::all()->pluck('name', 'id');
        return view('servicepeople.contact.phone_number.create', compact('phone_types'));
    }

//Store
    public function store(StoreServicepersonPhoneRequest $request)
    {
        $this->authorize('create', PhoneNumber::class);
        $phone_id = PhoneNumber::firstOrCreate(['number' => $request->number])->id;
        $this->serviceperson
            ->phoneNumbers()
            ->attach($phone_id,['phone_type_id' => $request->phone_type_id]);

        return response()->json(['success' => 'Phone Number Added!']);
    }
//    Delete

    public function destroy($id)
    {
        $this->authorize('delete', PhoneNumber::class);

        $this->serviceperson->phoneNumbers()->where('id', $id)->delete();

        return response()->json(['success' => 'Phone Number removed']);
    }

}
