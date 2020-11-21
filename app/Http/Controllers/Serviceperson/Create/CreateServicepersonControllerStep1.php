<?php

namespace App\Http\Controllers\Serviceperson\Create;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Create\BasicInfoRequest;
use App\Models\System\Universal\Lookup\Ethnicity;
use App\Models\System\Universal\Lookup\MaritalStatus;
use App\Models\System\Universal\Lookup\Religion;
use App\MultiStep\Steps;
use App\Services\FileServices\PhotoService;
use Intervention\Image\Facades\Image;


class CreateServicepersonControllerStep1 extends Controller
{
    /**
     * @var PhotoService
     */
    protected $photoService;

    public function __construct(PhotoService $photoService)
    {

        $this->photoService = $photoService;
    }

    public function index(Steps $steps)
    {
        $step = $steps->step('serviceperson.create', 1);
        $ethnicities = Ethnicity::all()->pluck('name', 'id');
        $religions = Religion::all()->pluck('name', 'id');
        $marital_statuses = MaritalStatus::all()->pluck('name', 'id');

        return view('servicepeople.create.basic_info',
            compact('step', 'ethnicities', 'religions', 'marital_statuses'));
    }

    public function store(Steps $steps, BasicInfoRequest $request)
    {
//        $this->photoService->storeServicepersonPhoto('storage/temp/');
//        Create Service name
        $number = $request->serviceperson['number'];
        $initial = strtolower(substr($request->serviceperson['first_name'],0,1));
        $lastName = strtolower($request->serviceperson['last_name']);
        $serviceName = $number.$initial.$lastName;
        $fileNameToStore = '';
//        Store serviceperson photo in temp location
        if($request->hasFile('serviceperson.photo')){
            $ext = $request->file('serviceperson.photo')->extension();
            $fileNameToStore = $serviceName.'.'.$ext;
            Image::make($request->file('serviceperson.photo'))
                ->resize(300,300)
                ->save(public_path('storage/temp/'. $fileNameToStore));
        }

       $steps->step('serviceperson.create', 1)
            ->store(array_merge($request->except('_token', 'serviceperson.photo'),
                ['servicepersonPhoto' => $fileNameToStore],
                ['serviceName' => $serviceName]
            ))->complete();

        return redirect()->route('serviceperson.create.2.index');
    }
}
