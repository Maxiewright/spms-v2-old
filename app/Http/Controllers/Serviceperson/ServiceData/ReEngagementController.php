<?php

namespace App\Http\Controllers\Serviceperson\ServiceData;

use App\Models\Serviceperson\MedicalClassification;
use App\Models\Serviceperson\ReEngagement;
use App\Models\Serviceperson\Serviceperson;
use App\Http\Controllers\Controller;
use App\Http\Requests\Serviceperson\ServiceData\StoreReEngagementRequest;
use App\Models\System\Serviceperson\ServiceData\ReEngagementPeriod;
use App\Models\System\Universal\Status\ApprovalStatus;
use App\Models\System\Universal\Status\RecommendationStatus;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ReEngagementController extends Controller
{
    protected $serviceperson, $reEngagementPeriods, $recommendationStatuses,$approvalStatuses, $medicalClassifications;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next){
            $this->serviceperson = Serviceperson::findOrFail(session('serviceNumber'));
            return $next($request);
        });

        $this->reEngagementPeriods = ReEngagementPeriod::all()->pluck('name', 'id');
        $this->recommendationStatuses = RecommendationStatus::all()->pluck('name', 'id');
        $this->approvalStatuses = ApprovalStatus::all()->pluck('name', 'id');
        $this->medicalClassifications = '';

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {

        $serviceNumber = $this->serviceperson->number;
        $reEngagementPeriods = $this->reEngagementPeriods;
        $recommendationStatuses = $this->recommendationStatuses;
        $approvalStatuses = $this->approvalStatuses;
        $medicalClassifications = $this->serviceperson->medicalClassifications;

        $recommenders = Serviceperson::whereHas('promotions', function ($q){
            $q->where('id', '>=', 11)
                ->where('id', '<=', 13);
        })->with('promotions')
            ->get()
            ->pluck('name', 'number');

        $approvers = Serviceperson::whereHas('promotions', function ($q){
            $q->where('id', '>=', 13)
                ->where('id', '<=', 15);
        })->with('promotions')
            ->get()
            ->pluck('name', 'number');

        return view('servicepeople.service_data.re_engagement.create',
            compact('serviceNumber', 'reEngagementPeriods', 'recommendationStatuses', 'approvalStatuses'
            ,'medicalClassifications', 'recommenders', 'approvers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReEngagementRequest $request
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function store(StoreReEngagementRequest $request)
    {
        $this->authorize('create', ReEngagement::class);

        ReEngagement::create($request->all());

        return response()->json(['success' => 'Re-engagement data stored!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param ReEngagement $reEngagement
     * @return Application|Factory|Response|View
     */
    public function edit(ReEngagement $reEngagement)
    {

        $serviceNumber = $this->serviceperson->number;
        $reEngagementPeriods = $this->reEngagementPeriods;
        $recommendationStatuses = $this->recommendationStatuses;
        $approvalStatuses = $this->approvalStatuses;
        $medicalClassifications = $this->serviceperson->medicalClassifications;


        $recommenders = Serviceperson::whereHas('promotions', function ($q){
            $q->where('id', '>=', 11)
                ->where('id', '<=', 13);
        })->with('promotions')
            ->get()
            ->pluck('name', 'number');

        $approvers = Serviceperson::whereHas('promotions', function ($q){
            $q->where('id', '>=', 13)
                ->where('id', '<=', 15);
        })->with('promotions')
            ->get()
            ->pluck('name', 'number');

        return view('servicepeople.service_data.re_engagement.edit',
            compact('reEngagement','serviceNumber','reEngagementPeriods', 'recommendationStatuses', 'approvalStatuses',
                'recommenders', 'approvers', 'medicalClassifications'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreReEngagementRequest $request
     * @param ReEngagement $reEngagement
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(StoreReEngagementRequest $request, ReEngagement $reEngagement)
    {
        $this->authorize('update', $reEngagement);

        $reEngagement->update($request->all());

        return response()->json(['success' => 'Re-engagement Data updated!']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ReEngagement $reEngagement
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws Exception
     */

    public function destroy(ReEngagement $reEngagement)
    {
        $this->authorize('delete', $reEngagement);

        $reEngagement->delete();

        return response()->json(['success' => 'Re-engagement Data Removed!']);
    }
}
