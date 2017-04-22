<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
class AccountController extends Controller
{
    public function getPassword(){
        return view('account.password');
    }
    public function postPassword(Request $request){
        $user= $request->user();
        if(! \Hash::check($request->get('current_password'),$user->password))
           { 
            return redirect()->back()->withErrors([
                    'current_password'=>'The current password is not valid'
                ]);
            }
        $this->validate($request,[
              'password'=>'required|confirmed',
              'password_confirmation'=>'required'
            ]);
        $user->password=bcrypt($request->get('password'));
        $user->save();

        return redirect('account')->with('alert','Your password has been changed');
    }

    public function getProfile(){
        $user = User::find(auth()->user()->id);
        return view('account.profile',compact('user'));
    }
    public function postProfile(Request $request)
    {   
        $user = User::find($request->get('user_id'));
        $user->name=$request->get('name');
        $user->username=$request->get('username');        
        $user->save();

        return redirect('account')->with('alert','Your profile has been updated');
    }    
    
}
