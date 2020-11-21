<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\MedicalRequest;
use App\Models\System\Serviceperson\Biodata\BloodType;
use App\Models\System\Serviceperson\Biodata\EyeColour;
use App\Models\System\Serviceperson\Biodata\HairColour;
use App\Models\System\Serviceperson\Biodata\Height;
use App\Models\System\Serviceperson\Biodata\SkinColour;
use App\Models\System\Serviceperson\Biodata\Weight;
use App\Models\System\Serviceperson\Medical\Allergy;
use App\Models\System\Serviceperson\Medical\AllergyType;
use App\Models\System\Serviceperson\Medical\MedicalCondition;
use App\Models\System\Serviceperson\Medical\Vaccine;
use App\MultiStep\Steps;

class CreateServicepersonControllerStep5 extends Controller
{
    public function index(Steps $steps)
    {
        $step = $steps->step('serviceperson.create', 5);
//        BioData
        $eyeColours =  EyeColour::all()->pluck('name','id');
        $hairColours =  HairColour::all()->pluck('name','id');
        $skinColours =  SkinColour::all()->pluck('name','id' );
        $bloodTypes = BloodType::all()->pluck('name','id' );
//        Height and Weight
        $heights =  Height::all()->pluck('name','id');
        $weights =  Weight::all()->pluck('name','id');
        $allergies =  Allergy::all()->pluck('name','id');
        $allergyTypes =  AllergyType::all()->pluck('name','id');
        $vaccines =  Vaccine::all()->pluck('name','id');
        $medicalConditions =  MedicalCondition::all()->pluck('name','id');
//        Redirect to previous step if not completed
        if ($step->notCompleted(1,2,3,4)){
            return redirect()->route('serviceperson.create.4.index');
        }

        return view('servicepeople.create.medical',
            compact('step', 'eyeColours', 'hairColours', 'skinColours', 'bloodTypes','heights', 'weights',
            'allergies', 'allergyTypes', 'vaccines', 'medicalConditions'));
    }

    public function store(Steps $steps, MedicalRequest $request)
    {
        $steps->step('serviceperson.create', 5)
            ->store($request->except('_token'))
            ->complete();

        return redirect()->route('serviceperson.create.6.index');
    }
}
