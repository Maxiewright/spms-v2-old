<?php

namespace App\Http\Controllers\Serviceperson\ServiceData;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\ServiceData\StoreUnitRequest;
use App\Models\Serviceperson\Unit;
use App\Models\System\Serviceperson\Unit\Battalion;
use App\Models\System\Serviceperson\Unit\Company;
use App\Models\System\Serviceperson\Unit\Platoon;
use App\Models\System\Serviceperson\Unit\Section;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;


class UnitController extends Controller
{

    protected $serviceNumber, $battalions, $companies, $platoons, $sections;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next){
            $this->serviceNumber = session('serviceNumber');
            return $next($request);
        });

        $this->battalions =  Battalion::all()->pluck('slug', 'id');
        $this->companies =  Company::all()->pluck('slug', 'id');
        $this->platoons =  Platoon::all()->pluck('slug','id');
        $this->sections =  Section::all()->pluck('slug','id');
    }

    /**
     * Show the create unit form
     *
     * @param Unit $unit
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(Unit $unit)
    {
        $this->authorize('create', Unit::class);

        $serviceNumber = $this->serviceNumber;
        $battalions = $this->battalions;
        $companies = $this->companies ;
        $platoons = $this->platoons;
        $sections =  $this->sections;

        return view('servicepeople.service_data.unit.create',
            compact('unit','serviceNumber', 'battalions', 'companies', 'platoons', 'sections'));
    }

    /**
     * Stores unit data
     *
     * @param StoreUnitRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreUnitRequest $request)
    {
        $this->authorize('create', Unit::class);

        Unit::create($request->all());

        return response()->json(['success' => 'Unit Created']);

    }

    /**
     * show the Unit update form
     *
     * @param Unit $unit
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Unit $unit)
    {
        $this->authorize('update', $unit);

        $battalions = $this->battalions;
        $companies = $this->companies ;
        $platoons = $this->platoons;
        $sections =  $this->sections;

        return view('servicepeople.service_data.unit.edit',
            compact('unit', 'battalions', 'companies', 'platoons', 'sections'));
    }

    /**
     * Update the Unit data
     *
     * @param StoreUnitRequest $request
     * @param Unit $unit
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(StoreUnitRequest $request, Unit $unit)
    {
        $this->authorize('update', $unit);

        $unit->update($request->all());

        return response()->json(['success' => 'Unit Updated!']);
    }

    /**
     * delete Unit data
     *
     * @param Unit $unit
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Unit $unit)
    {
        $this->authorize('delete', $unit);

        $unit->delete();

        return response()->json(['success' => 'Unit Removed!']);
    }
}
