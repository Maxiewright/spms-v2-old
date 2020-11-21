<?php

namespace App\Http\Controllers\Serviceperson\Qualification;

use App\Http\Controllers\Controller;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonEducation;
use App\Models\System\Serviceperson\Qualifications\Education\EducationGrade;
use App\Models\System\Serviceperson\Qualifications\Education\EducationLevel;
use App\Models\System\Serviceperson\Qualifications\Education\SchoolDistrict;
use App\Services\FileServices\CertificateService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class ServicepersonEducationController extends Controller
{
    protected $serviceperson;
    protected $educationLevels;
    protected $educationGrades;
    protected $schoolDistricts;

    /**
     * @var CertificateService
     */
    protected $certificateService;

    public function __construct(CertificateService $certificateService)
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next){
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

        $this->certificateService = $certificateService;

        $this->educationLevels = EducationLevel::all()->pluck('name','id');
        $this->educationGrades = EducationGrade::all()->pluck('grade','id');
        $this->schoolDistricts =  SchoolDistrict::all()->pluck('name','id');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ServicepersonEducation $servicepersonEducation
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function create(ServicepersonEducation $servicepersonEducation)
    {
        $this->authorize('create', ServicepersonEducation::class);

        $serviceNumber =$this->serviceperson->number;
        $educationLevels = $this->educationLevels;
        $educationGrades = $this->educationGrades;
        $schoolDistricts = $this->schoolDistricts;

        return view('servicepeople.qualifications.education.create',
            compact('servicepersonEducation','serviceNumber', 'educationLevels', 'educationGrades', 'schoolDistricts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return jsonResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize('create', ServicepersonEducation::class);

        $servicepersonEducation = ServicepersonEducation::create($request->all());

        $this->certificateService->storeEducationCertificate($servicepersonEducation);

        return response()->json(['success' => 'Education data created!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ServicepersonEducation $servicepersonEducation
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function edit(ServicepersonEducation $servicepersonEducation)
    {
        $this->authorize('update', $servicepersonEducation);

        $educationLevels = $this->educationLevels;
        $educationGrades = $this->educationGrades;
        $schoolDistricts = $this->schoolDistricts;

        return view('servicepeople.qualifications.education.edit',
            compact('servicepersonEducation', 'educationLevels', 'educationGrades',
                'schoolDistricts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ServicepersonEducation $servicepersonEducation
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(Request $request, ServicepersonEducation $servicepersonEducation)
    {
        $this->authorize('update', $servicepersonEducation);

        $servicepersonEducation->update($request->all());

        $this->certificateService->storeEducationCertificate($servicepersonEducation);

        return response()->json(['success' => 'Education data update!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServicepersonEducation $servicepersonEducation
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(ServicepersonEducation $servicepersonEducation)
    {
        $this->authorize('update', $servicepersonEducation);

        $servicepersonEducation->delete();

        return response()->json(['success' => 'Education data removed!']);
    }
}
