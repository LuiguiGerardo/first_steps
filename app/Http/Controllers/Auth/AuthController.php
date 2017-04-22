<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    protected $username= 'username';

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getConfirmation','getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username'=>'required|unique:users|min:4',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        $user= new User([
            'name' => $data['name'],
            'username'=>$data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->role='user';
        $user->registration_token=str_random(40);
        $user->save();

        $url= route('confirmation',['token'=>$user->registration_token]);

        Mail::send('emails/registration',compact('user','url'), function ($m) use ($user){
            $m->to($user->email, $user->name)->subject('Activa tu cuenta');
        });

        return $user;

    }
    public function loginPath()
    {
        return route('login');
    }
    public function redirectPath()
    {
        return route('home');
    }
    protected function getConfirmation($token)
    {
        $user= User::where('registration_token',$token)->firstOrFail();
        $user->registration_token=null;
        $user->save();

        return redirect()->route('home')->with('alert','Su email ha sido confirmado!');
    }

     protected function getCredentials(Request $request)
    {
        return [
            'username'=>$request->get('username'),
            'password'=>$request->get('password'),
            'active'=> true //Para ingresar al sistema tiene que ser un usuario activo
            
        ];
    }

    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user=$this->create($request->all());

        return redirect()->route('login')->with('alert','Por favor, confirme su email: '.$user->email);
    }
    public function getLogout(){
        auth()->logout();

        return redirect()->route('home');
    }    
}
