<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\DependentRequest;
use App\Models\System\Universal\Lookup\Gender;
use App\Models\System\Universal\Lookup\Relationship;
use App\Models\System\Universal\Lookup\Religion;
use App\MultiStep\Steps;
use Intervention\Image\Facades\Image;

class CreateServicepersonControllerStep8 extends Controller
{
    public function index(Steps $steps)
    {
        $step = $steps->step('serviceperson.create', 8);
        $relationships = Relationship::all()->pluck('name', 'id');
        $genders = Gender::all()->pluck('name', 'id');
        $religions = Religion::all()->pluck('name', 'id');

//        Return to incomplete step
        if ($step->notCompleted(1, 2, 3, 4, 5, 6, 7)) {
            return redirect()->route('serviceperson.create.7.index');
        }
        return view('servicepeople.create.dependents',
            compact('step', 'relationships', 'genders', 'religions'));
    }

    public function store(Steps $steps, DependentRequest $request)
    {

//        dd($request->dependent);
        $dependents = [];

        foreach ($request->dependent as $dependent) {

            $pin = $dependent['pin'];
            $initial = strtolower(substr($dependent['first_name'], 0, 1));
            $lastName = strtolower($dependent['last_name']);
            $dependentName = $pin . $initial . $lastName;
            $filename = '';
            if (isset($dependent['photo'])) {
                $ext = $dependent['photo']->extension();
                $filename =  $dependentName.'.'.$ext;
                Image::make($dependent['photo'])
                    ->resize(300, 300)
                    ->save(public_path('storage/temp/'.$filename));
            }

            $dependents[] = array_merge($dependent, ['photo' => $filename]);
        }

        $steps->step('serviceperson.create', 8)
            ->store(['dependent' => $dependents])
            ->complete();

        return redirect()->route('serviceperson.create.9.index');
    }
}
