<?php

namespace App\Http\Controllers\Serviceperson\ServiceData;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\ServiceData\StoreJobRequest;
use App\Models\Serviceperson\JobAppointment;
use App\Models\Serviceperson\Serviceperson;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class JobAppointmentController extends Controller
{
    protected $serviceperson, $branches;
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function($request, $next){
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

        $this->branches = Branch::all()->pluck('name', 'id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|void
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', JobAppointment::class);

        $serviceNumber = $this->serviceperson->number;
        $branches = $this->branches;

        return view('servicepeople.service_data.job_appointment.create',
            compact('serviceNumber', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJobRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreJobRequest $request)
    {
        $this->authorize('create', JobAppointment::class);

        JobAppointment::create($request->all());

        return response()->json(['success'=> 'Job Appointment Stored!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param JobAppointment $jobAppointment
     * @return Application|Factory|View|void
     * @throws AuthorizationException
     */
    public function edit(JobAppointment $jobAppointment)
    {
        $this->authorize('update', $jobAppointment);

        $serviceNumber = $this->serviceperson->number;
        $branches = $this->branches;

        return view('servicepeople.service_data.job_appointment.edit',
            compact('jobAppointment', 'branches', 'serviceNumber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreJobRequest $request
     * @param JobAppointment $jobAppointment
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(StoreJobRequest $request, JobAppointment $jobAppointment)
    {
        $this->authorize('update', $jobAppointment);

        $jobAppointment->update($request->all());

        return response()->json(['success'=> 'Job Appointment Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param JobAppointment $jobAppointment
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Request $request, JobAppointment $jobAppointment)
    {
       $this->authorize('delete', $jobAppointment);

       $jobAppointment->delete();

       return response()->json(['success'=> 'Job Appointment Removed!']);
    }
}
