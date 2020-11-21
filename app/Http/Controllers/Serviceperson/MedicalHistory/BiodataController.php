<?php

namespace App\Http\Controllers\Serviceperson\MedicalHistory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\MedicalHistory\UpdateBiodataRequest;
use App\Models\Serviceperson\Biodata;
use App\Models\System\Serviceperson\Biodata\BloodType;
use App\Models\System\Serviceperson\Biodata\EyeColour;
use App\Models\System\Serviceperson\Biodata\HairColour;
use App\Models\System\Serviceperson\Biodata\SkinColour;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class BiodataController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Biodata::class, 'biodatum');
    }

    /**
     * View Biodata Update Form
     *
     * @param Biodata $biodatum
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(Biodata $biodatum)
    {
        $this->authorize('update', $biodatum);

        $serviceNumber = session('serviceNumber');
        $eyeColours = EyeColour::all()->pluck('name','id');
        $hairColours = HairColour::all()->pluck('name','id');
        $skinColours = SkinColour::all()->pluck('name','id');
        $bloodTypes = BloodType::all()->pluck('name','id');

        return view('servicepeople.medical_history.biodata.edit',
            compact('biodatum', 'serviceNumber', 'eyeColours', 'hairColours', 'skinColours', 'bloodTypes'));
    }

    /**
     * Delete Biodata
     *
     * @param UpdateBiodataRequest $request
     * @param Biodata $biodatum
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function update(UpdateBiodataRequest $request, Biodata $biodatum)
    {

        $this->authorize('delete', $biodatum);

        $biodatum->update($request->all());

        return response()->json(['success' => 'Biodata Updated!']);
    }

}
