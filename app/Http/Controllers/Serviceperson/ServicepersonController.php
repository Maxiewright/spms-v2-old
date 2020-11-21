<?php

namespace App\Http\Controllers\Serviceperson;

use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\BasicInfo\ServicepersonBasicInfoRequest;
use App\Models\System\Serviceperson\LookUp\ServicepersonStatus;
use App\Models\System\Universal\Lookup\Ethnicity;
use App\Models\System\Universal\Lookup\MaritalStatus;
use App\Models\System\Universal\Lookup\Religion;
use App\Models\System\Universal\Polymorphic\Photo;
use App\Services\FileServices\PhotoService;
use App\Services\ServicepersonServices\ServicepersonService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class ServicepersonController extends Controller
{
    protected $serviceperson;
    /**
     * @var PhotoService
     */
    protected $photoService;

    public function __construct(PhotoService $photoService)
    {

        $this->middleware(function ($request, $next){
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

        $this->photoService = $photoService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $strength = ServicepersonService::strengthByGender();

        return view('servicepeople.index', compact('strength'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */

    public function create()
    {
        // Serviceperson create by MultiStep Form - CreateServicepersonControllers
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return void
     */
    public function store( )
    {
//        Serviceperson stored by StoreServicepersonService in the Create Controller MultiStep Form - CreateServicepersonControllers.
    }

    /**
     * Display the specified resource.
     *
     * @param Serviceperson $serviceperson
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function show(Serviceperson $serviceperson)
    {
        $this->authorize('view', $serviceperson);

        $servicepersonStatuses = ServicepersonStatus::all()->pluck('slug', 'id');

        //Set serviceperson number in the session to manipulate related data
        session(['serviceNumber' => $serviceperson->number]);

        return  view('servicepeople.show',
            compact('serviceperson', 'servicepersonStatuses'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Serviceperson $serviceperson
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function edit(Serviceperson $serviceperson)
    {
        $this->authorize('update', $serviceperson);

        $religions = Religion::all()->pluck('name', 'id');
        $marital_status = MaritalStatus::all()->pluck('name', 'id');
        $ethnicity = Ethnicity::all()->pluck('name', 'id');

        return   view('servicepeople.basic_info.edit',
            compact('serviceperson','religions', 'marital_status', 'ethnicity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ServicepersonBasicInfoRequest $request
     * @param Serviceperson $serviceperson
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(ServicepersonBasicInfoRequest $request, Serviceperson $serviceperson)
    {
        $this->authorize('update', $serviceperson);

        $serviceperson->update($request->all());

        return response()->json(['success' => 'Basic Info Updated!']);
    }

    public function updatePhoto(Request $request, $id)
    {

        $serviceperson = Serviceperson::find(session('serviceNumber'));

        $number = $serviceperson->number;
        $initial = strtolower(substr($serviceperson->first_name,0,1));
        $lastName = strtolower($serviceperson->last_name);
        $serviceName = $number.$initial.$lastName;

        $photo = Photo::find($id);

        $filename = $this->photoService->storePhoto('photo', $serviceName, '/storage/servicepeople/');

        $photo->update(['path' => $filename]);

        return redirect()->back();
    }

    /**
     * Update Serviceperson status
     *
     * @param Request $request
     * @param Serviceperson $serviceperson
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthorizationException
     */
    public function updateStatus(Request $request)
    {
//        $this->authorize('updateStatus', Serviceperson::class);

        $serviceperson = Serviceperson::find(session('serviceNumber'));

        $serviceperson->update([
            'serviceperson_status_id' => $request->status
        ]);

        return redirect()->back()->withToastSuccess('Serviceperson status changed!');
    }

}
