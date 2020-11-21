<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\IdentificationRequest;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitClass;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitTransactionCode;
use App\Models\System\Serviceperson\DriversPermit\DriversPermitType;
use App\Models\System\Universal\Lookup\Gender;
use App\MultiStep\Steps;

class CreateServicepersonControllerStep3 extends Controller
{
    public function index(Steps $steps)
    {

        $step = $steps->step('serviceperson.create', 3);
        $divisions = DivisionOrRegion::all()->pluck('name', 'id');
        $genders = Gender::all()->pluck('name', 'id');
        $driversPermitTypes = DriversPermitType::all()->pluck('name', 'id');
        $driversPermitClasses = DriversPermitClass::all()->pluck('name','id');
        $driversPermitTransactionCodes = DriversPermitTransactionCode::all()->pluck('name','id');
        //        Redirect to previous step if not completed
        if ($step->notCompleted(1,2)){
            return redirect()->route('serviceperson.create.2.index');
        }

        return view('servicepeople.create.identification',
            compact('step','divisions', 'genders', 'driversPermitTypes', 'driversPermitClasses', 'driversPermitTransactionCodes'));
    }

    public function store(Steps $steps, IdentificationRequest $request)
    {
        $steps->step('serviceperson.create', 3)
            ->store($request->except('_token'))
            ->complete();

        return redirect()->route('serviceperson.create.4.index');
    }
}
