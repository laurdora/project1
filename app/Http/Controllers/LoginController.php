<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;

class LoginController extends Controller
{
    public function postlogin(request $request)
    {

        if(Auth::attempt(['email'=> $request['email'], 'password'=> $request['password']]))
        {
            return redirect::to('index');
        }
        else 
        {
            return redirect::to('login')->with('Auth_error','Email address or Password is invalid, please try again.');
        }


    }

    public function user_logout()
    {
        Auth::logout();
        return redirect::to('login')->with('logout','Your have successfully loged out.');
    }
    
}
