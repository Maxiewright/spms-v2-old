<?php

namespace App\Http\Controllers\Serviceperson\Identification;

use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Identification\UpdateMilitaryIdRequest;
use App\Models\Serviceperson\MilitaryIdCard;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class MilitaryIdCardController extends Controller
{
    /**
     * View Military ID Card Edit Form
     *
     * @param MilitaryIdCard $militaryIdCard
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(MilitaryIdCard $militaryIdCard)
    {
        $this->authorize('update', $militaryIdCard);

        return view('servicepeople.identification.military_id_card.edit', compact('militaryIdCard'));
    }

    /**
     * Update Military ID Card
     *
     * @param UpdateMilitaryIdRequest $request
     * @param MilitaryIdCard $militaryIdCard
     * @return JsonResponse
     * @throws AuthorizationException
     */

    public function update(UpdateMilitaryIdRequest $request, MilitaryIdCard $militaryIdCard)
    {
        $this->authorize('update', $militaryIdCard);

        $militaryIdCard->update([
            'issued_on' => $request->issued_on,
            'expired_on' => $request->expired_on
        ]);

        return response()->json(['success' => 'Military ID Card Updated!']);
    }

}
