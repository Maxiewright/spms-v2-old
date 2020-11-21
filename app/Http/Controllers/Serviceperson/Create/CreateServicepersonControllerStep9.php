<?php

namespace App\Http\Controllers\Serviceperson\Create;


use App\Http\Controllers\Controller;

use App\Http\Requests\Serviceperson\Create\EmergencyContactRequest;
use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\PhoneType;
use App\Models\System\Universal\Lookup\Relationship;
use App\MultiStep\Steps;
use App\Models\System\Universal\Lookup\EmailType;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Services\FileServices\PhotoService;


class CreateServicepersonControllerStep9 extends Controller
{

    public function index(Steps $steps)
    {
        $step = $steps->step('serviceperson.create', 9);
        $relationships = Relationship::all()->pluck('name', 'id');
        $genders = Gender::all()->pluck('name', 'id');
//        Contact
        $divisions = DivisionOrRegion::all()->pluck('name', 'id');
        $phoneTypes = PhoneType::all()->pluck('name', 'id');
        $emailTypes = EmailType::all()->pluck('name', 'id');

//        Return to incomplete step
        if ($step->notCompleted(1,2,3,4,5,6,7,8)){
            return redirect()->route('serviceperson.create.8.index');
        }
        return view('servicepeople.create.emergency_contact',
            compact('step', 'relationships', 'genders', 'divisions', 'phoneTypes', 'emailTypes'));
    }

    public function store(Steps $steps, EmergencyContactRequest $request)
    {

        $steps->step('serviceperson.create', 9)
            ->store($request->except('_token'))
            ->complete();

        return redirect()->route('serviceperson.create.10.index');
    }
}
