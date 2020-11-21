<?php

namespace App\Http\Controllers\Serviceperson\Extracurricular;

use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Extracurricular\StoreServicepersonSportRequest;
use App\Models\Serviceperson\ServicepersonSport;
use App\Models\System\Serviceperson\Extracurricular\SportType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ServicepersonSportController extends Controller
{
    protected $serviceperson;

    /**
     * ServicepersonSportController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

    }

    /**
     * Show Serviceperson Store Form
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $this->authorize('create', ServicepersonSport::class);

        $sportTypes = SportType::all()->pluck('name', 'id');

        return view('servicepeople.extracurricular.sport.create', compact('sportTypes'));
    }

    /**
     * Store Serviceperson Sport
     *
     * @param StoreServicepersonSportRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreServicepersonSportRequest $request)
    {
        $this->authorize('create', ServicepersonSport::class);

        $this->serviceperson->sports()->attach($request->sport_id);

        return response()->json(['success' => 'Sport Created!']);
    }

    /**
     * Detach Serviceperson Sport
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function destroy($id)
    {
        $servicepersonSport = $this->serviceperson->sports()
            ->wherePivot('sport_id', $id);

        $this->authorize('delete', $servicepersonSport->first()->details);

        $servicepersonSport->detach();

        return response()->json(['success' => 'Sport Removed!']);

    }

}
