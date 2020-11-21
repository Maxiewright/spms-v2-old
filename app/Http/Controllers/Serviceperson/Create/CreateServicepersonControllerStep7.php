<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\ExtracurricularRequest;
use App\Models\System\Serviceperson\Extracurricular\Hobby;
use App\Models\System\Serviceperson\Extracurricular\HobbyType;
use App\Models\System\Serviceperson\Extracurricular\Sport;
use App\Models\System\Serviceperson\Extracurricular\SportType;
use App\MultiStep\Steps;

class CreateServicepersonControllerStep7 extends Controller
{
    public function index(Steps $steps)
    {
        $step = $steps->step('serviceperson.create', 7);
        $sports =  Sport::all()->pluck('name','id');
        $sportTypes = SportType::all()->pluck('name','id' );
        $hobbies =  Hobby::all()->pluck('name','id');
        $hobbyTypes =  HobbyType::all()->pluck('name','id');
//        Redirect to previous step if not completed
        if ($step->notCompleted(1,2,3,4,5,6)){
            return redirect()->route('serviceperson.create.6.index');
        }
        return view('servicepeople.create.extracurricular',
            compact('step', 'sportTypes', 'sports', 'hobbyTypes', 'hobbies' ));
    }

    public function store(Steps $steps, ExtracurricularRequest $request)
    {
        $steps->step('serviceperson.create', 7)
            ->store($request->except('_token'))
            ->complete();

        return redirect()->route('serviceperson.create.8.index');
    }
}
