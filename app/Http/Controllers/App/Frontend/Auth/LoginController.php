<?php

namespace App\Http\Controllers\App\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo;

    public function __construct()
    {

        $this->middleware('guest')->except('logout');
        
    }

    public function showLoginForm()
    {
        if(!session()->get('url.intended')){
            $previous=url()->previous();
            session()->put('url.intended',$previous);
        }
        return view('enfold.page.auth.login');
    }

    public function login(Request $request)
    {
        
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);
        $urlBase=url()->to('/').'/';
        $urlPrevious=session()->get('url.intended');

        if ($this->guard()->attempt(["phone" =>  $request->phone, "password" =>  $request->password])) {

            session()->remove('url.intended');
            
            if(($urlPrevious!=$urlBase.'/authentification') && ($urlPrevious===$urlBase)){

                if ($this->guard()->check() &&$this->guard()->user()->role_id == 3) {
                    return redirect()->route('admin.dashboard');
                } elseif ($this->guard()->check() && $this->guard()->user()->role_id == 2) {
                    return redirect()->route('blogger.dashboard');
                } else {
                    return redirect()->route('home');
                }
            }else {
                return redirect()->to($urlPrevious);
            }
        } else {
            return redirect()->back()->withErrors(["errors"=>"Identifiant ou mot de passe incorrect"]);
        }

    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
            return redirect()->route('home');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
