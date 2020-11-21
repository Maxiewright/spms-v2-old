<?php

namespace App\Http\Controllers\Serviceperson\MedicalHistory;

use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\MedicalHistory\UpdateServicepersonWeightRequest;
use App\Models\Serviceperson\Weigh;
use App\Models\System\Serviceperson\Biodata\Weight;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ServicepersonWeightController extends Controller
{
    protected $serviceperson;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->serviceperson = Serviceperson::findOrFail(session('serviceNumber'));
            return $next($request);
        });
    }

    /**
     * Show Serviceperson weight create form
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Weigh::class);

        $weights = Weight::all()->pluck('name', 'id');
        return view('servicepeople.medical_history.weight.create',
            compact('weights'));
    }

    /**
     * Store serviceperson weight information
     *
     * @param UpdateServicepersonWeightRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(UpdateServicepersonWeightRequest $request)
    {
        $this->authorize('create', Weigh::class);

        $serviceperson = Serviceperson::find(session('serviceNumber'));
        $serviceperson->weights()
            ->attach($request->weight_id, [
                'weighed_on' => $request->weighed_on
            ]);

        return response()->json(['success' => 'Weight Stored!']);
    }

    /**
     * Detaches weight data.
     *
     * @param $id
     * @param $weighDate
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function destroyWeight($id, $weighDate)
    {
        $servicepersonWeight = $this->serviceperson->weights()
            ->wherePivot('weight_id', '=', $id)
            ->wherePivot('weighed_on',$weighDate);

        $this->authorize('delete', $servicepersonWeight->first()->details);

        $servicepersonWeight->detach($id);

        return response()->json(['success' => 'Weight data removed']);
    }
}
