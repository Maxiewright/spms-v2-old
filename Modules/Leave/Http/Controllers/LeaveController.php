<?php

namespace Modules\Leave\Http\Controllers;

use App\Models\Serviceperson\Serviceperson;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Leave\Entities\Leave;
use Modules\Leave\Entities\LeaveEntitlement;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('leave::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return Renderable
     */
    public function create()
    {
        return view('leave::leave.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $leave = Leave::create($request->all());
        $entitlement = LeaveEntitlement::where('year', $leave->start_on->year)->id;
        $daysTaken = $leave->start_on->diffInDays($leave->end_on);
        $leave->entitlement->attach($entitlement, ['daysTaken' => $daysTaken]);
    }

    /**
     * Show the specified resource.
     * @param Serviceperson $serviceperson
     * @return Renderable
     */
    public function show(Serviceperson $serviceperson)
    {
        return view('leave::show', compact('serviceperson'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('leave::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
