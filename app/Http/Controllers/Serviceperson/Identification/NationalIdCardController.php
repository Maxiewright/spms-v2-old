<?php

namespace App\Http\Controllers\Serviceperson\Identification;


use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Identification\UpdateNationalIdRequest;
use App\Models\Serviceperson\NationalIdCard;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class NationalIdCardController extends Controller
{

    /**
     * View National ID Card Update Form
     *
     * @param NationalIdCard $nationalIdCard
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function edit(NationalIdCard $nationalIdCard)
    {
        $this->authorize('update', $nationalIdCard);
        return view('servicepeople.identification.national_id_card.edit', compact('nationalIdCard'));

    }

    /**
     * Update National ID Card
     *
     * @param UpdateNationalIdRequest $request
     * @param NationalIdCard $nationalIdCard
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UpdateNationalIdRequest $request, NationalIdCard $nationalIdCard)
    {
        $this->authorize('update', $nationalIdCard);

        $nationalIdCard->update([
            'issued_on' => $request->issued_on,
            'expired_on' => $request->expired_on
        ]);

        return response()->json(['success' => 'National ID Card Updated!']);
    }

}
