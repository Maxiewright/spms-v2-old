<?php

namespace App\Http\Controllers\Serviceperson\Identification;


use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\Identification\StorePassportRequest;
use App\Models\Serviceperson\Passport;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class PassportController extends Controller
{
    /**
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Passport::class);

        $serviceNumber = session('serviceNumber');

        return view('servicepeople.identification.passport.create', compact('serviceNumber'));
    }

    /**
     * Store Passport Data
     *
     * @param StorePassportRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StorePassportRequest $request)
    {
        $this->authorize('create', Passport::class);

        Passport::create($request->all());

        return response()->json(['success' => 'Passport Created!']);
    }

    /**
     * Delete Passport Data
     *
     * @param Request $request
     * @param Passport $passport
     * @return JsonResponse
     * @throws AuthorizationException|Exception
     */
    public function destroy(Request $request,Passport $passport)
    {
        $this->authorize('delete', $passport);

        $passport->delete();

        return response()->json(['success' => 'Passport Removed!']);
    }
}
