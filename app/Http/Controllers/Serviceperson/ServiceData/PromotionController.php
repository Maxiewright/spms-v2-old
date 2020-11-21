<?php

namespace App\Http\Controllers\Serviceperson\ServiceData;

use App\Models\Serviceperson\Promotion;
use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\ServiceData\StorePromotionRequest;
use App\Models\System\Serviceperson\ServiceData\Rank;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;


class PromotionController extends Controller
{

    protected $serviceperson, $ranks;

    /**
     * PromotionController constructor.
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->serviceperson = Serviceperson::find(session('serviceNumber'));
            return $next($request);
        });

        $this->ranks =  Rank::all()->pluck('regiment_slug','id');
    }

    /**
     * Show Create Promotion data form
     *
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function create ()
    {
        $this->authorize('create', Promotion::class);

        $serviceNumber = $this->serviceperson->number;

        $ranks =  $this->ranks;

        return view('servicepeople.service_data.promotion.create', compact('serviceNumber', 'ranks'));
    }

    /**
     * Store promotion data
     *
     * @param StorePromotionRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StorePromotionRequest $request)
    {
        $this->authorize('create', Promotion::class);

        $this->serviceperson
            ->promotions()
            ->attach($request->rank_id, [
            'promoted_on' => $request->promoted_on,
            'substantive_on' => $request->substantive_on
        ]);

        return response()->json(['success' => 'Promotion Added']);

    }

    /**
     * shows the promotion update form
     *
     * @param $id
     * @param $originalPromotionDate
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function editPromotion($id, $originalPromotionDate)
    {
        $servicepersonPromotion = $this->serviceperson->promotions()
            ->wherePivot('rank_id', '=', $id)
            ->wherePivot('promoted_on',$originalPromotionDate);

        $this->authorize('update', $servicepersonPromotion->first()->details);

        $promotion = $servicepersonPromotion->first();

        $ranks =  Rank::all()->pluck('regiment_slug','id');

        return view('servicepeople.service_data.promotion.edit',
            compact('originalPromotionDate','promotion', 'ranks'));
    }

    /**
     * Updates promotion data
     *
     * @param StorePromotionRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(StorePromotionRequest $request)
    {
       $servicepersonPromotion = $this->serviceperson
            ->promotions()
            ->wherePivot('promoted_on', $request->original_promotion_date);

       $this->authorize('update',$servicepersonPromotion->first()->details);

       $servicepersonPromotion->updateExistingPivot($request->rank_id, [
            'promoted_on' => $request->promoted_on,
            'substantive_on' => $request->substantive_on,
        ]);

       return response()->json(['success' => 'Promotion data updated!' ]);

    }

    /**
     * Delete promotion data
     *
     * @param $id
     * @param $originalPromotionDate
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroyPromotion($id, $originalPromotionDate)
    {
        $servicepersonPromotion = $this->serviceperson->promotions()
            ->wherePivot('rank_id', '=', $id)
            ->wherePivot('promoted_on',$originalPromotionDate);

        $this->authorize('delete', $servicepersonPromotion->first()->details);

        $servicepersonPromotion->detach($id);

        return response()->json(['success' => 'Promotion data removed' ]);
    }

}
