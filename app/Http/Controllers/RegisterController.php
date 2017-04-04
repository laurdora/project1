<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Registered_user;
use Auth;
use Hash;


class RegisterController extends Controller
{
    // Function for register validation
    public function store(request $request){
    	$this->validate($request , [
            'fname' =>'required',
            'username' =>'required',
            'password' =>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'cpassword' =>'required|same:password',
            'email' =>'required|email',
            'address' =>'required',
            'state' =>'required',
            'usertype' => 'required',
            'country' =>'required',
            'zip' =>'required|numeric',
            'phonenum' =>'required|numeric',
            'password.min'=> 'the confirm password must be at least 6 characters',
            'cpassword.same' => 'the password and confirm password must be the same',
            'password.regex' => 'Your password must contain one uppercase and one lowercase letters and one number'
            ]);

            $users = new Registered_user();
            $users->fname=$request['fname'];
            $users->username=$request['username'];
            $users->password=Hash::make($request['password']);
            $users->email=$request['email'];
            $users->usertype=$request['usertype'];
            $users->company=$request['company'];
            $users->address=$request['address'];
            $users->state=$request['state'];
            $users->country=$request['country'];
            $users->zip=$request['zip'];
            $users->phonenum=$request['phonenum'];

            $users->save();

    		return Redirect::to('login')->with('success','Congratulations! Your account has successfully registered!');
    	}
    

}