<?php

namespace App\Http\Controllers\Serviceperson\MedicalHistory;

use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\MedicalHistory\StoreServicepersonMedicalConditionRequest;
use App\Models\Serviceperson\ServicepersonMedicalCondition;
use App\Models\System\Serviceperson\Medical\MedicalCondition;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServicepersonMedicalConditionController extends Controller
{

    protected $serviceperson;
    protected $medicalConditions;

    /**
     * ServicepersonMedicalConditionController constructor.
     */
    public function __construct()
    {
        $this->middleware(function($request, $next){
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

        $this->medicalConditions =  MedicalCondition::all()->pluck('name', 'id');
    }

    /**
     * Create Medical Condition
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */

    public function create ()
    {
        $this->authorize('create', ServicepersonMedicalCondition::class);

        $serviceNumber = $this->serviceperson->number;

        $medicalConditions = $this->medicalConditions;

        return view('servicepeople.medical_history.medical_condition.create',
            compact('serviceNumber', 'medicalConditions'));
    }

    /**
     * Store Medical Condition
     *
     * @param StoreServicepersonMedicalConditionRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function store(StoreServicepersonMedicalConditionRequest $request)
    {
        $this->authorize('create', ServicepersonMedicalCondition::class);

        $this->serviceperson->medicalConditions()
            ->attach($request->medical_condition_id, [
                'particulars' => $request->particulars,
            ]);

        return response()->json(['success' => 'Medical Condition Stored!']);
    }

    /**
     * Edit Medical Condition
     *
     * @param $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $servicepersonMedicalCondition = $this->serviceperson->medicalConditions()
            ->wherePivot('medical_condition_id', $id)
            ->first();

        $this->authorize('update', $servicepersonMedicalCondition->details);

        $medicalConditions = $this->medicalConditions;

        return view('servicepeople.medical_history.medical_condition.edit',
            compact('servicepersonMedicalCondition', 'medicalConditions'));
    }

    /**
     * Update Medical Condition
     *
     * @param StoreServicepersonMedicalConditionRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(StoreServicepersonMedicalConditionRequest $request)
    {
        $servicepersonMedicalCondition = $this->serviceperson->medicalConditions()
            ->wherePivot('medical_condition_id', $request->medical_condition_id);

        $this->authorize('update', $servicepersonMedicalCondition->first()->details);

        $servicepersonMedicalCondition->updateExistingPivot($request->medical_condition_id, [
                'particulars' => $request->particulars,
            ]);

        return response()->json(['success' => 'Medical Condition Updated!']);
    }


    /**
     * Detach Medical Condition
     *
     * @param $id
     * @return Application|Factory|JsonResponse|RedirectResponse|View
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $servicepersonMedicalCondition = $this->serviceperson->medicalConditions()
            ->wherePivot('medical_condition_id', $id);

        $this->authorize('delete', $servicepersonMedicalCondition->first()->details);

        $servicepersonMedicalCondition->detach();

        return response()->json(['success' => 'Medical Condition Removed!']);

    }
}
