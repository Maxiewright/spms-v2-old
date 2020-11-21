<?php

namespace App\Http\Controllers\Serviceperson\MedicalHistory;

use App\Models\Serviceperson\Measurement;
use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\MedicalHistory\UpdateServicepersonHeightRequest;
use App\Models\System\Serviceperson\Biodata\Height;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;


class ServicepersonHeightController extends Controller
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
     * Show Serviceperson Height Create Form
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */

    public function create()
    {
        $this->authorize('create', Measurement::class);

        $heights = Height::all()->pluck('name', 'id');

        return view('servicepeople.medical_history.height.create', compact('heights'));
    }

    /**
     * Store Serviceperson Height Information
     *
     * @param UpdateServicepersonHeightRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     *
     */
    public function store(UpdateServicepersonHeightRequest $request)
    {
        $this->authorize('create', Measurement::class);

        $serviceperson = Serviceperson::find(session('serviceNumber'));

        $serviceperson->measurements()
            ->attach($request->height_id, [
                'measured_on' => $request->measured_on
            ]);

        return response()->json(['success' => 'Height Stored!']);
    }

    /**
     * Detaches height data.
     *
     * @param $id
     * @param $measurementDate
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function destroyHeight($id, $measurementDate)
    {

        $servicepersonHeight = $this->serviceperson->measurements()
            ->wherePivot('height_id', '=', $id)
            ->wherePivot('measured_on',$measurementDate);

        $this->authorize('delete', $servicepersonHeight->first()->details);

        $servicepersonHeight->detach($id);

        return response()->json(['success' => 'Height data removed']);
    }
}
