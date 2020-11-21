<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\ContactRequest;
use App\Models\System\Serviceperson\Address\DivisionOrRegion;
use App\Models\System\Universal\Lookup\PhoneType;
use App\MultiStep\Steps;
use App\Models\System\Universal\Lookup\EmailType;

class CreateServicepersonControllerStep2 extends Controller
{
    public function index(Steps $steps)
    {
        $step = $steps->step('serviceperson.create', 2);
//        Redirect to previous step if not completed
        if ($step->notCompleted(1)){
            return redirect()->route('serviceperson.create.1.index')->withInput();
        }

        $divisions = DivisionOrRegion::all()->pluck('name', 'id');
        $phoneTypes = PhoneType::all()->pluck('name', 'id');
        $emailTypes = EmailType::all()->pluck('name', 'id');
        return view('servicepeople.create.contact',
            compact('step','divisions', 'phoneTypes', 'emailTypes'));
    }

    public function store(Steps $steps, ContactRequest $request)
    {

        $steps->step('serviceperson.create', 2)
            ->store($request->except('_token'))
            ->complete();

        return redirect()->route('serviceperson.create.3.index');
    }
}
