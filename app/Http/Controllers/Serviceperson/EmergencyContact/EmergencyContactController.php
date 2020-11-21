<?php

namespace App\Http\Controllers\Serviceperson\EmergencyContact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\EmergencyContactRequest;
use App\Http\Requests\Serviceperson\EmergencyContact\StoreEmergencyContactRequest;
use App\Http\Requests\Serviceperson\EmergencyContact\UpdateEmergencyContactRequest;
use App\Models\Serviceperson\EmailAddress;
use App\Models\Serviceperson\EmergencyContact;
use App\Models\Serviceperson\PhoneNumber;
use App\Models\Serviceperson\Serviceperson;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Universal\Lookup\EmailType;
use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\PhoneType;
use App\Models\System\Universal\Lookup\Relationship;
use App\Services\ContactServices\ContactService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EmergencyContactController extends Controller
{
    protected $serviceperson, $relationships, $genders;
    protected $phoneTypes, $emailTypes, $divisions;
    /**
     * @var ContactService
     */
    protected $contactService;

    /**
     * EmergencyContactController constructor.
     * @param ContactService $contactService
     */
    public function __construct(ContactService $contactService)
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->serviceperson = Serviceperson::findOrFail(session('serviceNumber'));
            return $next($request);
        });

        $this->relationships = Relationship::all()->pluck('name', 'id');
        $this->genders = Gender::all()->pluck('name', 'id');
        $this->phoneTypes = PhoneType::all()->pluck('name', 'id');
        $this->emailTypes = EmailType::all()->pluck('name', 'id');
        $this->divisions = DivisionOrRegion::all()->pluck('name', 'id');

        $this->contactService = $contactService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|void
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', EmergencyContact::class);

        $serviceNumber = $this->serviceperson->number;
        $relationships = $this->relationships;
        $genders = $this->genders;
        $phoneTypes = $this->phoneTypes;
        $emailTypes = $this->emailTypes;
        $divisions = $this->divisions;

        return view('servicepeople.emergency_contacts.create',
            compact('serviceNumber', 'relationships', 'genders', 'phoneTypes', 'emailTypes', 'divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEmergencyContactRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreEmergencyContactRequest $request)
    {
        $this->authorize('create', EmergencyContact::class);

        DB::transaction(function () use ($request) {

            $emergencyContact = EmergencyContact::create($request->all());

            $this->contactService->storePhoneNumber($emergencyContact);

            $this->contactService->storeEmailAddress($emergencyContact);

            $this->contactService->storeAddress($emergencyContact);

        });

        return response()->json(['success' => 'Emergency Contact Stored!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param EmergencyContact $emergencyContact
     * @return Application|Factory|View|void
     * @throws AuthorizationException
     */
    public function edit(EmergencyContact $emergencyContact)
    {
        $this->authorize('update', $emergencyContact);

        $serviceNumber = $this->serviceperson->number;
        $relationships = $this->relationships;
        $genders = $this->genders;
        $phoneTypes = $this->phoneTypes;
        $emailTypes = $this->emailTypes;
        $divisions = $this->divisions;

        return view('servicepeople.emergency_contacts.edit',
            compact('emergencyContact','serviceNumber', 'relationships', 'genders', 'phoneTypes', 'emailTypes', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEmergencyContactRequest $request
     * @param EmergencyContact $emergencyContact
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UpdateEmergencyContactRequest $request, EmergencyContact $emergencyContact)
    {
        $this->authorize('update', $emergencyContact);

        DB::transaction(function () use ($request, $emergencyContact) {

            $emergencyContact->update($request->all());

            $this->contactService->storePhoneNumber($emergencyContact);

            $this->contactService->storeEmailAddress($emergencyContact);

            $this->contactService->storeAddress($emergencyContact);

        });


        return response()->json(['success' => 'Emergency Contact Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param EmergencyContact $emergencyContact
     * @return JsonResponse
     * @throws AuthorizationException | Exception
     */
    public function destroy(EmergencyContact $emergencyContact)
    {
        $this->authorize('delete', $emergencyContact);

        $emergencyContact->delete();

        return response()->json(['success' => 'Emergency Contact Removed!']);
    }
}
