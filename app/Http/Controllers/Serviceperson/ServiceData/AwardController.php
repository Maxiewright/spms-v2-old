<?php

namespace App\Http\Controllers\Serviceperson\ServiceData;

use App\Models\Serviceperson\Award;
use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\ServiceData\StoreAwardRequest;
use App\Http\Requests\Serviceperson\ServiceData\UpdateAwardRequest;
use App\Models\System\Serviceperson\ServiceData\Decoration;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;


class AwardController extends Controller
{
    protected $serviceperson;
    protected $decorations;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

        $this->decorations = Decoration::all()->pluck('name','id');
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Award::class);

        $serviceNumber = $this->serviceperson->number;

        $decorations = $this->decorations;

        return view('servicepeople.service_data.award.create',
            compact('serviceNumber', 'decorations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAwardRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreAwardRequest $request)
    {
        $this->authorize('create', Award::class);

        $this->serviceperson->awards()
            ->attach($request->decoration_id,[
                'received_on' => $request->received_on
            ]);

        return response()->json(['success' => 'Decoration Created!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function edit($id)
    {
        $award = $this->serviceperson->awards()
            ->wherePivot('decoration_id', $id)
            ->first();

        $this->authorize('update', $award->details);

        $decorations = $this->decorations;

        return view('servicepeople.service_data.award.edit',
            compact('award', 'decorations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAwardRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(UpdateAwardRequest $request)
    {
        $award = $this->serviceperson->awards()
            ->wherePivot('decoration_id', $request->decoration_id);

        $this->authorize('update', $award->first()->details);

        $award->updateExistingPivot($request->decoration_id,[
                'received_on' => $request->received_on
            ]);


        return response()->json(['success' => 'Decoration Updated!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy($id)
    {
        $award = $this->serviceperson->awards()
            ->wherePivot('decoration_id', $id);

        $this->authorize('delete', $award->first()->detials);

        $award->detach($id);

        return response()->json(['success' => 'Award Removed!']);
    }
}
