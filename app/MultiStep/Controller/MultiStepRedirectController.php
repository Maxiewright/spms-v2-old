<?php


namespace App\MultiStep\Controller;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MultiStepRedirectController extends Controller
{
    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        return redirect($request->getUri() .'/1');
    }
}
