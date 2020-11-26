<?php


namespace App\Actions\Fortify;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword
{
    use PasswordValidationRules;

    public function changePassword(Request $request){

        $request->validate([
            'current_password' => 'required|password:web',
            'password' => $this->passwordRules(),
            'password_confirmation' => 'required'
        ],[
            'current_password.required' => 'Current password is required',
            'password.required' => 'A new password is required',
            'password.different' => 'The new password must be different from the current',
            'password_confirmation.required' => 'please confirm your new password'
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('password'));
        $user->password_change_at = Carbon::now();
        $user->save();

        return redirect()->route('dashboard')
            ->with("success","Password successfully changed !");
    }

}
