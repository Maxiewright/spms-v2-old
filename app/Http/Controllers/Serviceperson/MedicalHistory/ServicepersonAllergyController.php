<?php

namespace App\Http\Controllers\Serviceperson\MedicalHistory;

use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\MedicalHistory\StoreServicepersonAllergyRequest;
use App\Models\Serviceperson\ServicepersonAllergy;
use App\Models\System\Serviceperson\Medical\Allergy;
use App\Models\System\Serviceperson\Medical\AllergyType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ServicepersonAllergyController extends Controller
{
    protected $serviceperson;
    protected $allergies;
    protected $allergyTypes;

    public function __construct()
    {
        $this->middleware(function($request, $next){
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

        $this->allergies = Allergy::all()->pluck('name','id');
        $this->allergyTypes = AllergyType::all()->pluck('name','id');
    }

    /**
     * Create Serviceperson Allergy
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create ()
    {
        $this->authorize('create', ServicepersonAllergy::class);

        $serviceNumber = $this->serviceperson->number;
        $allergies = $this->allergies;
        $allergyTypes = $this->allergyTypes;

        return view('servicepeople.medical_history.allergy.create',
            compact('serviceNumber', 'allergies', 'allergyTypes'));
    }


    /**
     * @param StoreServicepersonAllergyRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreServicepersonAllergyRequest $request)
    {
        $this->authorize('create', ServicepersonAllergy::class);

        $this->serviceperson->allergies()
            ->attach($request->allergy_id, [
                'particulars' => $request->particulars,
            ]);

        return response()->json(['success' => 'Allergy Stored!']);
    }

    /**
     * Edit Serviceperson Allergy
     * @param $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */

    public function edit($id)
    {

        $servicepersonAllergy = $this->serviceperson->allergies()
            ->wherePivot('allergy_id', $id)
            ->first();

        $this->authorize('update', $servicepersonAllergy->details);

        $allergies = $this->allergies;
        $allergyTypes = $this->allergyTypes;

        return view('servicepeople.medical_history.allergy.edit',
            compact('servicepersonAllergy', 'allergies', 'allergyTypes'));
    }

    /**
     * Update Serviceperson Allergy
     *
     * @param StoreServicepersonAllergyRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function update(StoreServicepersonAllergyRequest $request)
    {
       $servicepersonAllergy = $this->serviceperson->allergies()
            ->wherePivot('allergy_id', $request->allergy_id);

       $this->authorize('update', $servicepersonAllergy->first()->details);

       $servicepersonAllergy->updateExistingPivot($request->allergy_id, [
           'particulars' => $request->particulars,
       ]);

        return response()->json(['success' => 'Allergy Updated!']);
    }

    /**
     * Detach Serviceperson Allergy
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function destroy($id)
    {
        $servicepersonAllergy = $this->serviceperson->allergies()
            ->wherePivot('allergy_id', $id);

        $this->authorize('delete', $servicepersonAllergy->first()->details);

        $servicepersonAllergy->detach();

        return response()->json(['success' => 'Allergy Removed!']);

    }
}
