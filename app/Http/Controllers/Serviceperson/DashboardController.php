<?php

namespace App\Http\Controllers\Serviceperson;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('servicepeople.dashboard', [
            // Specify the base layout.
            // Eg: 'side-menu', 'simple-menu', 'top-menu', 'login'
            // The default value is 'side-menu'

            // 'layout' => 'side-menu'
        ]);
    }
}
