<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\NewAccount;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        if (Auth::check() && Auth::user()->role_id==3) {
            $this->redirectTo=route('admin.dashboard');
        }else
        {    if(Auth::check() && Auth::user()->role_id==2) {
                $this->redirectTo=route('blogger.dashboard');
            }
        }

        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        /* 
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:255'],
                'about' => ['sometimes', 'string', 'max:255'],
                'image' => ['sometimes'],
                'role_id' => ['required', 'integer'],
                'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]); 
        
            User::create([
                'name' => $data['name'],
                'image' => $data['image'],
                'phone' => $data['phone'],
                'username' => $data['username'],
                'about' => $data['about'],
                'role_id' => $data['role_id'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
        
        */

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users'],
        ]); 
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'username' => $data['name'],
            'about' => 'Salut tous le monde, je suis'.$data['name'],
            'email' => $data['email'],
            'role_id' => 1,
            'password' => Hash::make('password')
        ]);
        
        //Notification::route('mail', $user->email)->notify(new NewAccount($user,'password'));

        return $user;
    }
}
