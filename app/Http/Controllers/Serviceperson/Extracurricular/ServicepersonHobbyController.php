<?php

namespace App\Http\Controllers\Serviceperson\Extracurricular;

use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Extracurricular\StoreServicepersonHobbyRequest;
use App\Models\Serviceperson\ServicepersonHobby;
use App\Models\System\Serviceperson\Extracurricular\HobbyType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class ServicepersonHobbyController extends Controller
{

    protected $serviceperson;

    /**
     * ServicepersonHobbyController constructor.
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
       $this->authorize('create', ServicepersonHobby::class);

       $hobbyTypes = HobbyType::all()->pluck('name', 'id');

       return view('servicepeople.extracurricular.hobby.create', compact('hobbyTypes'));
    }

    /**
     * Store Serviceperson Hobby
     *
     * @param StoreServicepersonHobbyRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreServicepersonHobbyRequest $request)
    {
        $this->authorize('create', ServicepersonHobby::class);

        $this->serviceperson->hobbies()->attach($request->hobby_id);

        return response()->json(['success' => 'Hobby Created!']);
    }

    /**
     * Detach Serviceperson Hobby
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function destroy($id)
    {
        $servicepersonHobby = $this->serviceperson->hobbies()
            ->wherePivot('hobby_id', $id);

        $this->authorize('delete', $servicepersonHobby->first()->details);

        $servicepersonHobby->detach();

        return response()->json(['success' => 'Hobby Removed!']);

    }


}
