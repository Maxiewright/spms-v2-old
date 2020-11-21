<?php

namespace App\Http\Controllers\Serviceperson\Contact;

use App\Http\Requests\Serviceperson\Contact\UpdateServicepersonEmailRequest;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\EmailAddress;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Contact\StoreServicepersonEmailRequest;
use App\Models\System\Universal\Lookup\EmailType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class ServicepersonEmailAddressController extends Controller
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
        $this->authorize('create', EmailAddress::class);

        $email_types = EmailType::all()->pluck('name', 'id');

        return view('servicepeople.contact.email_address.create', compact('email_types'));
    }

//Store
    public function store(StoreServicepersonEmailRequest $request)
    {
        $this->authorize('create', EmailAddress::class);

        $emailId = EmailAddress::firstOrCreate(['email' => $request->email])->id;

        $this->serviceperson
            ->emailAddresses()
            ->attach($emailId,['email_type_id' => $request->email_type_id]);

        return response()->json(['success' => 'Email Added!']);
    }

    /**
     * show the update form
     *
     * @param $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $this->authorize('create', EmailAddress::class);

        $emailTypes = EmailType::all()->pluck('name', 'id');

        $emailAddress = EmailAddress::find($id);

        $emailType = $emailAddress->serviceperson->first()->pivot->email_address_id;

        return view('servicepeople.contact.email_address.edit', compact('emailTypes', 'emailType',  'emailAddress'));
    }

    /**
     * update email address
     *
     * @param StoreServicepersonEmailRequest $request
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UpdateServicepersonEmailRequest $request, $id)
    {
        $email = EmailAddress::find($id);

        $this->authorize('update', $email);

        $email->update([
            'email' => $request->email,
        ]);

        return response()->json(['success' => 'Email updated!']);
    }

//    Delete
    public function destroy($id)
    {
        $email = EmailAddress::find($id);

        $this->authorize('delete', $email);

        $email->delete();

        $this->serviceperson->emailAddresses()->where('email_address_id', $id)->detach();

        return response()->json(['success' => 'Email removed!']);
    }
}
