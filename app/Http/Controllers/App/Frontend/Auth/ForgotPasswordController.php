<?php

namespace App\Http\Controllers\App\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\VerificationMessage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ForgotPasswordController extends Controller
{
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('enfold.page.auth.passwords.email');
    }

    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        return User::where('email', $request->email)->get();
    }

    public function sendResetLinkEmail(Request $request)
    {
        $users = $this->validateEmail($request);
        
        if (count($users) != 0) {
            foreach ($users as $key => $user) {
                Notification::route('mail', $user->email)->notify(new VerificationMessage($user,$request->_token));
            }
        }
        return view('enfold.page.auth.verify')->with('email', $request->email);
    }
}
