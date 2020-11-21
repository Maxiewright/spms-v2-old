<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\QualificationRequest;
use App\Models\System\Serviceperson\Qualifications\Course\CourseQualification;
use App\Models\System\Serviceperson\Qualifications\Course\CourseType;
use App\Models\System\Serviceperson\Qualifications\Education\EducationGrade;
use App\Models\System\Serviceperson\Qualifications\Education\EducationLevel;
use App\Models\System\Serviceperson\Qualifications\Education\SchoolDistrict;
use App\MultiStep\Steps;

class CreateServicepersonControllerStep6 extends Controller
{
    public function index(Steps $steps)
    {
        $step = $steps->step('serviceperson.create', 6);
//        Education
        $educationGrades =  EducationGrade::all()->pluck('grade','id');
        $educationLevels =  EducationLevel::all()->pluck('name','id');
        $schoolDistricts =  SchoolDistrict::all()->pluck('name','id');


//        Courses
        $courseQualifications =  CourseQualification::all()->pluck('name','id');
        $courseTypes =  CourseType::all()->pluck('name','id');
//        Redirect to previous step if not completed
        if ($step->notCompleted(1,2,3,4,5)){
            return redirect()->route('serviceperson.create.5.index');
        }

        return view('servicepeople.create.qualifications',
            compact('step','educationLevels', 'educationGrades', 'schoolDistricts','courseTypes', 'courseQualifications'));
    }

    public function store(Steps $steps, QualificationRequest $request)
    {
        $steps->step('serviceperson.create', 6)
            ->store($request->except('_token'))
            ->complete();

        return redirect()->route('serviceperson.create.7.index');
    }
}
