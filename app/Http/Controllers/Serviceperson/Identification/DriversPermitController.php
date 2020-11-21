<?php

namespace App\Http\Controllers\Serviceperson\Identification;


use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Identification\StoreDriversPermitRequest;
use App\Http\Requests\Serviceperson\Identification\UpdateDriversPermitRequest;
use App\Models\Serviceperson\DriversPermit;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class DriversPermitController extends Controller
{

    /**
     * Create Drivers Permit
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', DriversPermit::class);

        $serviceNumber = session('serviceNumber');
        $dp_classes = DriversPermitClass::all()->pluck('name','id');
        $dp_transaction_codes = DriversPermitTransactionCode::all()->pluck('name','id');
        $dp_types = DriversPermitType::all()->pluck('name','id');

        return view('servicepeople.identification.drivers_permit.create', compact('serviceNumber', 'dp_classes','dp_transaction_codes', 'dp_types'));
    }

    /**
     * Store Drivers Permit
     *
     * @param StoreDriversPermitRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function store(StoreDriversPermitRequest $request)
    {
        $this->authorize('create', DriversPermit::class);

        DriversPermit::create($request->all());

        return response()->json(['success' => 'Drivers Permit Created!']);
    }

    /**
     * View Drivers permit Edit Form
     *
     * @param DriversPermit $driversPermit
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(DriversPermit $driversPermit)
    {
       $this->authorize('update', $driversPermit);

        $dp_classes = DriversPermitClass::all()->pluck('name','id');
        $dp_transaction_codes = DriversPermitTransactionCode::all()->pluck('name','id');
        $dp_types = DriversPermitType::all()->pluck('name','id');

        return view('servicepeople.identification.drivers_permit.edit',
            compact('driversPermit','dp_classes','dp_transaction_codes', 'dp_types'));
    }


    /**
     * Update Drivers permit
     *
     * @param UpdateDriversPermitRequest $request
     * @param DriversPermit $driversPermit
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function update(UpdateDriversPermitRequest $request, DriversPermit $driversPermit)
    {
        $this->authorize('update', $driversPermit);

       $driversPermit->update($request->all());

       return response()->json(['success' => 'Drivers Permit Updated!']);
    }


    /**
     * Delete Drivers Permit
     *
     * @param Request $request
     * @param DriversPermit $driversPermit
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Request $request, DriversPermit $driversPermit)
    {
        $this->authorize('delete', $driversPermit);

        $driversPermit->delete();

        return response()->json('success', 'Drivers Permit Removed!');
    }
}
