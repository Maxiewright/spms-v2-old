<?php

namespace App\Http\Controllers\Serviceperson;

use App\Http\Controllers\Controller;
use App\Services\ServicepersonServices\ServicepersonService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ServicepersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
//        $strength = ServicepersonService::strengthByGender();

        return view('servicepeople.index');

    }
}
