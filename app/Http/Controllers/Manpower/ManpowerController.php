<?php

namespace App\Http\Controllers\Manpower;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManpowerController extends Controller
{
    public function paradeState()
    {
        $user = Auth::user();
        return view('manpower.parade-state', compact('user'));
    }
}
