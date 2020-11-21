<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\MultiStep\Steps;
use App\Services\ServicepersonServices\StoreServicepersonService;
use Illuminate\Support\Facades\Session;


class CreateServicepersonControllerStep10 extends Controller
{
    public function index(Steps $steps)
    {
        $step = $steps->step('serviceperson.create', 9);
        $serviceperson = Session::get('multistep.serviceperson.create.1.data.serviceperson');
        $contact = Session::get('multistep.serviceperson.create.2.data');
        $identification = Session::get('multistep.serviceperson.create.3.data');
        $serviceData = Session::get('multistep.serviceperson.create.4.data');
        $medical = Session::get('multistep.serviceperson.create.5.data');
        $qualification = Session::get('multistep.serviceperson.create.6.data');
        $extracurricular = Session::get('multistep.serviceperson.create.7.data');
        $dependents = Session::get('multistep.serviceperson.create.8.data.dependent');
        $emergencyContact = Session::get('multistep.serviceperson.create.9.data');

        if ($step->notCompleted(1,2,3,4,5,6,7,8,9)){
            return redirect()->route('serviceperson.create.8.index');
        }
        return view('servicepeople.create.review',
            compact('step', 'serviceperson','contact','identification','serviceData','medical','qualification'
                ,'extracurricular','dependents', 'emergencyContact'));
    }

    public function store(Steps $steps, StoreServicepersonService $service)
    {

        $steps->step('serviceperson.create', 10)
            ->complete();

        $service->store($steps->data());
        $steps->clearAll();
        return redirect()->route('servicepeople.index');

    }
}
