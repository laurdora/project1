<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Redirect;
use Auth;

class AdminLoginController extends Controller
{
    public function postlogin(request $request)
    {

        if(Auth::guard('admin')->attempt(['email'=> $request['email'], 'password'=> $request['password']]))
        {
            return Redirect::to('admin/home');
        }
        else 
        {
            return redirect::to('admin/login')->with('Auth_error','Email address or Password is invalid, please try again.');
        }


    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect::to('admin/login')->with('logout','Your have successfully loged out.');
    }
    
}
