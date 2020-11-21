<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\ServiceDataRequest;
use App\Models\System\Serviceperson\CareerManagement\CareerManagementSystem\Branch;
use App\Models\System\Serviceperson\ServiceData\Decoration;
use App\Models\System\Serviceperson\ServiceData\EngagementPeriod;
use App\Models\System\Serviceperson\ServiceData\EnlistmentType;
use App\Models\System\Serviceperson\ServiceData\Rank;
use App\Models\System\Serviceperson\Unit\Battalion;
use App\Models\System\Serviceperson\Unit\Company;
use App\Models\System\Serviceperson\Unit\Platoon;
use App\Models\System\Serviceperson\Unit\Section;
use App\MultiStep\Steps;

class CreateServicepersonControllerStep4 extends Controller
{
    public function index(Steps $steps)
    {

//        Enlistment Data
        $enlistmentTypes = EnlistmentType::all()->pluck('name', 'id');
        $engagementPeriods = EngagementPeriod::all()->pluck('name', 'id');
        $decorations = Decoration::all()->pluck('name', 'id');
        $ranks = Rank::all()->pluck('regiment_slug', 'id');


//       Job Data
        $branches = Branch::all()->pluck('name', 'id');
//        $career_paths = CareerPath::all()->pluck('name', 'id');

//       Unit Data
        $battalions = Battalion::all()->pluck('slug', 'id');
        $companies = Company::all()->pluck('slug', 'id');
        $platoons = Platoon::all()->pluck('name', 'id');
        $sections = Section::all()->pluck('name', 'id');


        $step = $steps->step('serviceperson.create', 4);

        if ($step->notCompleted(1,2,3)){
            return redirect()->route('serviceperson.create.3.index');
        }

        return view('servicepeople.create.service_data',
            compact('step', 'enlistmentTypes', 'engagementPeriods','decorations', 'ranks',
            'battalions', 'companies', 'platoons', 'sections', 'branches'));
    }

    public function store(Steps $steps, ServiceDataRequest $request)
    {
        $steps->step('serviceperson.create', 4)
            ->store($request->except('_token'))
            ->complete();

        return redirect()->route('serviceperson.create.5.index');
    }
}
