<?php

namespace App\Http\Controllers\Serviceperson\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Contact\UpdateServicepersonAddressRequest;
use App\Models\Serviceperson\Address;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;


class ServicepersonAddressController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Address::class, 'serviceperson_address');
    }

    public function edit(Address $serviceperson_address)
    {
        $divisions = DivisionOrRegion::all()->pluck('name', 'id');
        return view('servicepeople.contact.address.edit',
            compact('serviceperson_address', 'divisions'));
    }

    public function update(UpdateServicepersonAddressRequest $request, Address $serviceperson_address)
    {
        $serviceperson_address->update($request->all());

        return response()->json(['success' => 'Address Updated!']);
    }

}
