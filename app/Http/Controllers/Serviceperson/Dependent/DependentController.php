<?php

namespace App\Http\Controllers\Serviceperson\Dependent;

use App\Models\Serviceperson\Dependent;
use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Dependent\StoreDependentRequest;
use App\Http\Requests\Serviceperson\Dependent\UpdateDependentRequest;
use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\Relationship;
use App\Models\System\Universal\Lookup\Religion;
use App\Services\FileServices\PhotoService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class DependentController extends Controller
{
protected $serviceperson, $dependentRelationships,$religions, $genders;
    /**
     * @var PhotoService
     */
    protected $photoService;


    public function __construct(PhotoService $photoService)
    {
        $this->middleware(function ($request, $next){
            $this->serviceperson = Serviceperson::findOrFail(session('serviceNumber')) ;
            return $next($request);
        });

        $this->dependentRelationships = Relationship::all()->pluck('name', 'id');
        $this->religions = Religion::all()->pluck('name', 'id');
        $this->genders = Gender::all()->pluck('name', 'id');
        $this->photoService = $photoService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Dependent::class);

        $serviceNumber = $this->serviceperson->number;

        $dependentRelationships = $this->dependentRelationships;
        $religions = $this->religions;
        $genders = $this->genders;

        return view('servicepeople.dependent.create',
            compact('serviceNumber', 'dependentRelationships','religions' ,'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDependentRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function store(StoreDependentRequest $request)
    {
        $this->authorize('create', Dependent::class);

        $dependent =  Dependent::create($request->all());

        $this->photoService->storeDependentPhoto($dependent);

        $this->serviceperson->dependents()->attach($dependent->pin);

        return response()->json(['success' => 'Dependent Added!']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dependent $dependent
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function edit(Dependent $dependent)
    {
        $this->authorize('update', $dependent);

        $dependentRelationships = $this->dependentRelationships;
        $religions = $this->religions;
        $genders = $this->genders;

        return  view('servicepeople.dependent.edit',
            compact('dependent', 'dependentRelationships', 'religions', 'genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDependentRequest $request
     * @param Dependent $dependent
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function update(UpdateDependentRequest $request, Dependent $dependent)
    {
        $this->authorize('update', $dependent);

        $dependent->update($request->all());

        if ($request->hasFile('dependent_photo')){
            $this->photoService->storeDependentPhoto($dependent);
        }

        return response()->json(['success' => 'Dependent Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Dependent $dependent
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(Request $request, Dependent $dependent)
    {
        $this->authorize('delete', $dependent);

        $dependent->delete();

        return response()->json(['success' => 'Dependent Removed!']);
    }
}
