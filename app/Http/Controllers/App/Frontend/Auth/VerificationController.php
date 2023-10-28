<?php

namespace App\Http\Controllers\App\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    private $resendLink;
    public function __construct(ForgotPasswordController $forgetPassword)
    {
        $this->resendLink=$forgetPassword;
    } 

    public function verify($email)
    {
        return view('enfold.page.auth.verify')->with('email', $email);
    }
    
    public function resend(Request $request){
        return $this->resendLink->sendResetLinkEmail($request);
        
    }
}
