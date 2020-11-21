<?php

namespace App\Http\Controllers\Serviceperson\Qualification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Qualification\StoreServicepersonCourseRequest;
use App\Models\Serviceperson\Serviceperson;
use App\Models\Serviceperson\ServicepersonCourse;
use App\Models\System\Serviceperson\Qualifications\Course\Course;
use App\Models\System\Serviceperson\Qualifications\Course\CourseInstitution;
use App\Models\System\Serviceperson\Qualifications\Course\CourseQualification;
use App\Models\System\Serviceperson\Qualifications\Course\CourseType;
use App\Services\FileServices\CertificateService;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class ServicepersonCourseController extends Controller
{
    protected $serviceperson;
    protected $courseTypes;
    protected $courseInstitutions;
    protected $courses;
    protected $courseQualifications;
    protected $certificateService;

    /**
     * ServicepersonCourseController constructor.
     * @param CertificateService $certificateService
     */
    public function __construct(CertificateService $certificateService)
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next){
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

        $this->courseTypes = CourseType::all()->pluck('name', 'id');
        $this->courseInstitutions = CourseInstitution::all()->pluck('name', 'id');
        $this->courses = Course::all()->pluck('name', 'id');
        $this->courseQualifications = CourseQualification::all()->pluck('name', 'id');
        $this->certificateService = $certificateService;
    }

    /**
     * show the Serviceperson Course create form
     *
     * @param ServicepersonCourse $servicepersonCourse
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create(ServicepersonCourse $servicepersonCourse)
    {
        $this->authorize('create', ServicepersonCourse::class);

        $serviceNumber = $this->serviceperson->number;
        $courseTypes = $this->courseTypes;
        $courseInstitutions = $this->courseInstitutions;
        $courseQualifications = $this->courseQualifications;

        return view('servicepeople.qualifications.course.create',
            compact('servicepersonCourse','serviceNumber', 'courseTypes', 'courseInstitutions','courseQualifications'));
    }

    /**
     * Store the Serviceperson Course
     *
     * @param StoreServicepersonCourseRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreServicepersonCourseRequest $request)
    {
        $this->authorize('create', ServicepersonCourse::class);

        $servicepersonCourse = ServicepersonCourse::create($request->all());

        $this->certificateService->storeCourseCertificate($servicepersonCourse);

        return response()->json(['success' => 'Course Added']);
    }

    /**
     * Show the Update Serviceperson Course Form
     *
     * @param ServicepersonCourse $servicepersonCourse
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(ServicepersonCourse $servicepersonCourse)
    {
        $this->authorize('update', $servicepersonCourse);

        $courseTypes = $this->courseTypes;
        $courseInstitutions = $this->courseInstitutions;
        $courses = $this->courses;
        $courseQualifications = $this->courseQualifications;

        return view('servicepeople.qualifications.course.edit',
            compact('servicepersonCourse', 'courseTypes', 'courseInstitutions', 'courses', 'courseQualifications'));
    }

    /**
     * Update Serviceperson Course
     *
     * @param StoreServicepersonCourseRequest $request
     * @param ServicepersonCourse $servicepersonCourse
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(StoreServicepersonCourseRequest $request, ServicepersonCourse $servicepersonCourse)
    {
        $this->authorize('update', $servicepersonCourse);

        $servicepersonCourse->update($request->all());

        $this->certificateService->storeCourseCertificate($servicepersonCourse);

        return response()->json(['success' => 'Course Updated!']);
    }

    /**
     * Delete Serviceperson Course
     *
     * @param ServicepersonCourse $servicepersonCourse
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */
    public function destroy(ServicepersonCourse $servicepersonCourse)
    {
        $this->authorize('delete', $servicepersonCourse);

        $servicepersonCourse->delete();

        return response()->json(['success' => 'Course removed!']);
    }
}
