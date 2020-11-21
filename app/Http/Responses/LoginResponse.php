<?php


namespace App\Http\Responses;

use App\Events\FirstLogin;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    /**
     * @param Request $request
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function toResponse($request)
    {
        $user = Auth::user();

//        Check if its the users first login
        if (!$user->passwordChanged() && !$user->hasVerifiedEmail()){
            //dispatch verification email on first login attempt
            FirstLogin::dispatch($user);
            // Redirect user to verification view
            return redirect('/email/verify');
        }

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : $this->roleRedirect();
    }

    private function roleRedirect()
    {
        foreach (Auth::user()->getRoleNames() as $role){
            switch ($role) {
                case 'commanding-officer':
                case 'super-admin':
                    return redirect()->intended('servicepeople');
                    break;
                case 'company-commander':
                    return redirect()->intended('dashboard');
                    break;
                case 'platoon-commander':
                    return redirect()->intended('parade_state');
                    break;
                case 'serviceperson':
                    return redirect('servicepeople/'.auth()->user()->serviceperson->number);
                default:
                    return redirect()->intended(config('fortify.home'));
            }
        }
    }

}
