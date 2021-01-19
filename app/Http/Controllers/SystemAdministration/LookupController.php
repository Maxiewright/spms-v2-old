<?php

namespace App\Http\Controllers\SystemAdministration;

use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;

use App\Models\System\Serviceperson\Address\CityOrTown;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\CareerPath;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Specialty;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Stream;
use App\Models\System\Serviceperson\CareerManagement\Job\Job;
use App\Models\System\Serviceperson\Extracurricular\Hobby;
use App\Models\System\Serviceperson\Extracurricular\Sport;
use App\Models\System\Serviceperson\Medical\Allergy;
use App\Models\System\Serviceperson\Qualifications\Course\CourseInstitution;
use App\Models\System\Serviceperson\Qualifications\Education\School;
use App\Models\System\Serviceperson\Qualifications\Education\Subject;
use App\Models\System\Serviceperson\Unit\Company;
use App\Models\System\Serviceperson\Unit\Platoon;
use Illuminate\Http\Request;


class LookupController extends Controller
{

    //   Record Card - Unit Data
    public function getCities($id)
    {
        $cities = CityOrTown::where('division_or_region_id', $id )->pluck('name','id');
        return json_encode($cities);
    }

    public function getCompanies($id)
    {
        $companies = Company::where('battalion_id', $id)->pluck('slug', 'id');
        return json_encode($companies);
    }

    public function getPlatoons($id)
    {
        $platoons = Platoon::where('company_id', $id)->pluck('slug', 'id');
        return json_encode($platoons);
    }

    // Record Card - Education

    public function getSubjects($id)
    {
        $subjects = Subject::where('education_level_id', $id)->pluck('name','id');
        return json_encode($subjects);
    }

    public  function getSchools($id)
    {
        $schools = School::where('school_district_id', $id)->pluck('name', 'id');
        return json_encode($schools);
    }

    public function getCourseInstitutions($id)
    {
        $courseInstitutions = CourseInstitution::where('course_type_id', $id)->pluck('name','id');
        return json_encode($courseInstitutions);

    }

    public  function getCourses($id)
    {
        $courses = CourseInstitution::findOrFail($id)
            ->course()
            ->pluck('name', 'id');

        return json_encode($courses);
    }

//    Record Card - Extracurricular

    public function getSports($id)
    {
        $sports = Sport::where('sport_type_id', $id)->pluck('name', 'id');
        return json_encode($sports);
    }

    public function getHobbies($id)
    {
        $hobbies = Hobby::where('hobby_type_id', $id)->pluck('name', 'id');
        return json_encode($hobbies);
    }

    public function getServiceperson(Request $request)
    {
        $search = $request->get('term');

        $result = Serviceperson::with(['rank' => function ($query){
         $query->orderBy('promoted_on', 'DESC');
        }])->with(['photo'])
            ->where('last_name', 'like', '%' .$search . '%')
            ->orWhere('first_name', 'like', '%' .$search . '%')
            ->orWhere('number', 'like', '%' .$search . '%')
            ->get();

            return response()->json($result);
    }

    /**
    ********************************************** Medical Data  ********************************************
     */

    public function getAllergies($id)
    {
        $allergies = Allergy::where('allergy_type_id', $id)->pluck('name', 'id');
        return json_encode($allergies);
    }

    /************************************************ Service Data  *********************************************/

    // Branch System
    public function getStreams($id)
    {
        $streams = Stream::where('branch_id', $id)->pluck('name', 'id');
        return json_encode($streams);
    }

    public function getCareerPaths($id)
    {
      $careerPaths = CareerPath::where('stream_id', $id)->pluck('name', 'id');
      return json_encode($careerPaths);
    }

    public function getspecialties($id)
    {
        $specialties = Specialty::where('career_path_id', $id)->pluck('name', 'id');
        return json_encode($specialties);
    }

    public function getJobs($id)
    {
        $jobs = Job::join('job_titles', 'job_title_id','=', 'job_titles.id')
            ->select('name', 'slug', 'jobs.id')
            ->where('career_path_id', $id)
            ->pluck('slug', 'jobs.id');
        return json_encode($jobs);
    }

}
