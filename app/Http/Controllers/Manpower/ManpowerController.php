<?php

namespace App\Http\Controllers\Manpower;

use App\Http\Controllers\Controller;
use App\Services\CareerManagementServices\BranchService;
use App\Services\CareerManagementServices\StreamService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManpowerController extends Controller
{
    public $branch;
    public $stream;

    /**
     * ManpowerController constructor.
     * @param BranchService $branch
     * @param StreamService $stream
     */
    public function __construct(BranchService $branch, StreamService $stream)
    {
        $this->branch = $branch;
        $this->stream = $stream;
    }


    public function index()
    {
        return view('manpower.index');
    }

    /**
     * Return Branch Data
     *
     * @return Application|Factory|View
     */
    public function branch()
    {
        $establishment = $this->branch::establishment();
        $strength= $this->branch::strength();
        return view('manpower.vacancies.branch',
            compact(  'establishment', 'strength'));
    }

    /**
     * Return stream data
     *
     * @return Application|Factory|View
     */
    public function stream()
    {
        $establishment = $this->stream::establishment();
        $strength = $this->stream::strength();

        return view('manpower.vacancies.stream',
            compact('establishment', 'strength'));
    }

    public function paradeState()
    {
        $user = Auth::user();
        return view('manpower.parade-state', compact('user'));
    }
}
