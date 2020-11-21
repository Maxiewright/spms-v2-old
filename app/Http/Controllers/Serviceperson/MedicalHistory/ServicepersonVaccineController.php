<?php

namespace App\Http\Controllers\Serviceperson\MedicalHistory;

use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\MedicalHistory\StoreServicepersonVaccineRequest;
use App\Models\Serviceperson\ServicepersonVaccine;
use App\Models\System\Serviceperson\Medical\Vaccine;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;


class ServicepersonVaccineController extends Controller
{
    protected $serviceperson;

    public function __construct()
    {
       $this->middleware(function($request, $next){
           $this->serviceperson = Serviceperson::find(session('serviceNumber'));
           return $next($request);
       });
    }

    /**
     *  Create Vaccine
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create ()
    {
        $this->authorize('create', ServicepersonVaccine::class);

        $serviceNumber = $this->serviceperson->number;
        $vaccines = Vaccine::all()->pluck('name', 'id');
        return view('servicepeople.medical_history.vaccine.create', compact('serviceNumber', 'vaccines'));
    }

    /**
     * Store Vaccine
     * @param StoreServicepersonVaccineRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreServicepersonVaccineRequest $request)
    {
        $this->authorize('create', ServicepersonVaccine::class);

        $this->serviceperson->vaccines()
            ->attach($request->vaccine_id, [
                'received_on' => $request->received_on,
                'place_administered' => $request->place_administered
            ]);

        return response()->json(['success' => 'Vaccine Stored!']);
    }

    /**
     * Edit Vaccine
     * @param $id
     * @param $originalReceiptDate
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function editVaccine($id, $originalReceiptDate)
    {
        $servicepersonVaccine = $this->serviceperson->vaccines()
        ->wherePivot('vaccine_id', $id)
        ->wherePivot('received_on', $originalReceiptDate)
        ->first();

        $this->authorize('update', $servicepersonVaccine->details);

        $vaccines = Vaccine::all()->pluck('name', 'id');

        return view('servicepeople.medical_history.vaccine.edit',
            compact('servicepersonVaccine', 'vaccines', 'originalReceiptDate'));
    }

    /**
     * Update Vaccine
     * @param StoreServicepersonVaccineRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function update(StoreServicepersonVaccineRequest $request)
    {
        $servicepersonVaccine = $this->serviceperson->vaccines()
            ->wherePivot('vaccine_id', $request->vaccine_id)
            ->wherePivot('received_on', $request->original_receipt_date);


        $this->authorize('update', $servicepersonVaccine->first()->details);


        $servicepersonVaccine->updateExistingPivot($request->vaccine_id, [
                'received_on' => $request->received_on,
                'place_administered' => $request->place_administered
            ]);

        return response()->json(['success' => 'Vaccine Updated!']);
    }

    /**
     * Detach Vaccine
     * @param $id
     * @param $originalReceiptDate
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroyVaccine($id, $originalReceiptDate)
    {
        $servicepersonVaccine = $this->serviceperson->vaccines()
            ->wherePivot('vaccine_id', $id)
            ->wherePivot('received_on', $originalReceiptDate);

        $this->authorize('delete', $servicepersonVaccine->first()->details);

        $servicepersonVaccine->detach($id);

        return response()->json(['success' => 'Vaccine Removed!']);
    }
}
