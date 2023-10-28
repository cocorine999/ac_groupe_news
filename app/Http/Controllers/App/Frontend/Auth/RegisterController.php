<?php

namespace App\Http\Controllers\App\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\NewAccount;
use App\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private $logged;
    public function __construct(LoginController $log)
    {
        $this->logged=$log;
        $this->middleware('guest')->except('logout');
    }    

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $data)
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
        
        

            return Validator::make($data, [
                'name' => ['required', 'string', 'max:5'],
                'phone' => ['required', 'string', 'max:8','unique:users'],
                'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users'],
            ]); 
        */

        $data->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:8|max:11|unique:users',
            'email' => 'sometimes|string|email|max:255|unique:users',
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
        $users=User::where('username',$data['name'])->first();
        
        if($users){
            $data['username']=$data['name'].'11';
        }else {
            $data['username']=$data['name'];
        }
        $user = User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'username' => $data['username'],
            'about' => 'Salut tous le monde, je suis '.$data['name'],
            'email' => $data['email'],
            'role_id' => 1,
            'password' => Hash::make($data['password'])
        ]);
        
        Notification::route('mail', $user->email)->notify(new NewAccount($user,$data['password']));
        //By clicking "Reset Password" we will send a password reset link
        return $user;
    }


    public function showRegisterForm()
    {
        if(!session()->get('url.intended')){
            $previous=url()->previous();
            session()->put('url.intended',$previous);
        }
        return view('enfold.page.auth.register');
    }

    public function register(Request $request)
    {
        //$pass=\Str::random(8);

        $this->validator($request);

        $request['password']=\Str::random(8);
        
        $this->create($request->all());
        return $this->logged->login($request);
        
    }
}
