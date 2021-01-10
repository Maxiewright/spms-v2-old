<?php

namespace Modules\Leave\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display the leave dashboard.
     * @return Renderable
     */
    public function dashboard()
    {
        return view('leave::dashboard');
    }

    /**
     * Display an overview of servicepeople leave information.
     * @return Renderable
     */
    public function index()
    {
        return view('leave::index');
    }

    /**
     * Display a listing of all refunds.
     * @return Renderable
     */
    public function adjustment()
    {
        return view('leave::adjustments');
    }

}
