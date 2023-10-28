<?php

namespace App\Http\Controllers\App\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Notifications\EmailMessage;
use Illuminate\Support\Facades\Notification;


class ResetPasswordController extends Controller
{
    private $_token;
    private $email;
    public function showResetForm($full_url)
    {
        session()->remove('email');
        if(!session()->get('email')){
            
            session()->put('email',\Str::after(url()->full(), '&Email='));
        }
        return redirect()->route('show_reset_form');
    }

    public function show_reset_form(){
        return view('enfold.page.auth.passwords.reset');
    }
 

    protected function validateReset(Request $request)
    {
        $request->validate([
            '_token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
    }

    public function reset(Request $request)
    {
        $this->validateReset($request);
        $user=User::where('email',$request->email)->first();
        $this->resetPassword($user,$request->password);
        Notification::route('mail', $user->email)->notify(new EmailMessage($user));
        return view('enfold.page.auth.login');
    }

    protected function resetPassword(User $user, $password)
    {
        $this->setUserPassword($user, $password);

        $user->setRememberToken(\Str::random(60));

        $user->save();

        $this->guard()->login($user);
    }

    /**
     * Set the user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function setUserPassword(User $user, $password)
    {
        $user->password = Hash::make($password);
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
