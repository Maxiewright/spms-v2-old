<?php

namespace App\Http\Controllers\Serviceperson\ServiceData;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\ServiceData\StoreEnlistmentRequest;
use App\Http\Requests\Serviceperson\ServiceData\UpdateEnlistmentRequest;
use App\Models\Serviceperson\Enlistment;
use App\Models\Serviceperson\Serviceperson;
use App\Models\System\Serviceperson\ServiceData\EngagementPeriod;
use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EnlistmentController extends Controller
{
     protected $serviceNumber, $enlistmentTypes, $engagementPeriods;

    /**
     * EnlistmentController constructor.
     */
    public function __construct ()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next){
            $this->serviceNumber = session('serviceNumber');
            return $next($request);
        });

        $this->enlistmentTypes = EnlistmentType::all()->pluck('name','id');
        $this->engagementPeriods = EngagementPeriod::all()->pluck('name', 'id');
    }

    /**
     * @param Enlistment $enlistment
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(Enlistment $enlistment)
    {
        $this->authorize('create', Enlistment::class);

        $serviceNumber = $this->serviceNumber;
        $enlistmentTypes = $this->enlistmentTypes;
        $engagementPeriods = $this->engagementPeriods;

        return  view('servicepeople.service_data.enlistment.create',
            compact('enlistment','serviceNumber', 'enlistmentTypes', 'engagementPeriods'));
    }

    /**
     * Store Enlistment Data
     *
     * @param StoreEnlistmentRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreEnlistmentRequest $request)
    {
        $this->authorize('create', Enlistment::class);

        Enlistment::create($request->all());

        return response()->json(['success' => 'Enlistment Data Stored!']);
    }

    /**
     * Show the Enlistment Data Form
     *
     * @param Enlistment $enlistment
     * @return Application|Factory|View
     * @throws AuthorizationException
     */

    public function edit(Enlistment $enlistment)
    {
        $this->authorize('update', $enlistment);

        $enlistmentTypes = $this->enlistmentTypes;
        $engagementPeriods = $this->engagementPeriods;

        return view('servicepeople.service_data.enlistment.edit',
            compact('enlistment', 'enlistmentTypes', 'engagementPeriods'));
    }

    /**
     * Update Enlistment Data
     *
     * @param UpdateEnlistmentRequest $request
     * @param Enlistment $enlistment
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UpdateEnlistmentRequest $request, Enlistment $enlistment)
    {
        $this->authorize('update', $enlistment);

        $enlistment->update($request->all());

        return response()->json(['success' => 'Enlistment Data Updated!']);
    }

    /**
     * Delete Enlistment Data
     *
     * @param Request $request
     * @param Enlistment $enlistment
     * @return JsonResponse
     * @throws AuthorizationException|Exception
     */
    public function destroy(Request $request, Enlistment $enlistment)
    {
        $this->authorize('delete', $enlistment);

        $enlistment->delete();

        return response()->json(['success' => 'Enlistment Data Removed!']);
    }
}
