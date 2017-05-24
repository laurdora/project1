<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use App\Registered_user;
use App\user_preference;
use App\Post;
use Auth;
use Hash;


class RegisterController extends Controller
{
    // Function for register validation
    public function store(request $request){
        
        $user = Registered_user::where('username', '=', $request->username)->first();
        $email = Registered_user::where('email', '=', $request->email)->first();
        if ($email !== null || $user !== null)
        {
            return Redirect::back()->with('existed', 'The email/username you are using already existed.');
        }
        else 
        {

    	$this->validate($request , [
            
            'fname' =>'required|max:20|regex:/^[\pL\s]+$/u',
            'username' =>'required|max:20|unique:registered_users,username',
            'password' =>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'cpassword' =>'required|same:password',
            'company' =>'required|regex:/^[\pL\s]+$/u|max:40',
            'email' =>'required|email|unique:registered_users,email',
            'address' =>'required|max:50',
            'state' =>'required|alpha|max:15',
            'usertype' => 'required',
            'country' =>'required|regex:/^[\pL\s]+$/u|max:15',
            'zip' =>'required|numeric|digits:4',
            'phonenum' =>'required|numeric|digits_between:10,13',
            ],

            [
            'password.min'=> 'The confirm password must be at least 6 characters',
            'cpassword.same' => 'The password and confirm password must be the same',
            'password.regex' => 'Your password must contain one uppercase and one lowercase letters and one number',
            'zip.digits' => 'Zip code should be a 4 digits number',

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
            
            $preference = new user_preference();
            $preference->username=$request['username'];
            $preference->preference_1=$request['preference_1'];
            $preference->preference_2=$request['preference_2'];
            $preference->preference_3=$request['preference_3'];

            $preference->save();


        	return Redirect::to('login')->with('success','Congratulations! Your account has successfully registered!');
            }
    	}

    public function show_userprofile(request $request)
    {
        $user = Registered_user::where('username', $request->username)->get();
        $posts = Post::where('username', $request->username)->latest()->paginate(5);
        $thisuser = $user[0];
        //return $posts;
        return view("layouts/userdetail", ['user'=>$thisuser], ['posts'=>$posts]);

    }

    public function edit_profile()
    {
        $interests=['meat', 'milk', 'fruit', 'vegetable', 'cheese', 'wine', 'grain'];
        $preference=user_preference::where('username', Auth::user()->username)->first();
        return view("layouts/edit_profile", ['interests'=>$interests], ['preference'=>$preference]);
    }

    public function destroy()
    {
    $user = Auth::user();
    Auth::logout();
    $user->delete();
    Post::where('username', $user->username)->delete();
    user_preference::where('username', $user->username)->delete();
    return Redirect::to('login')->with('deleted', 'your account has successfully deleted!');
        //return Redirect::to('login')->with('deleted', 'Congratulations! Your account has successfully registered!');
    }
    
    public function update(request $request)
    {
        $this->validate($request , [
            
            'fname' =>'required|max:20|regex:/^[\pL\s]+$/u',
            'company' =>'required|regex:/^[\pL\s]+$/u|max:40',
            'email' =>'required|email',
            'address' =>'required|max:50',
            'state' =>'required|alpha|max:15',
            'country' =>'required|regex:/^[\pL\s]+$/u|max:15',
            'zip' =>'required|numeric|digits:4',
            'phonenum' =>'required|numeric|digits_between:10,13',
            ]);

        $user = Auth::user();
        $user->fname = $request->fname;
        $user->company = $request->company;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->zip = $request->zip;
        $user->phonenum = $request->phonenum;
        $user->update();

        $preference = user_preference::where('username', Auth::user()->username)->first();
        $preference->preference_1=$request['preference_1'];
        $preference->preference_2=$request['preference_2'];
        $preference->preference_3=$request['preference_3'];

        $preference->update();

        return Redirect::to('my_account')->with('profile_updated', 'your profile has been updated');

    }

        public function change_password(request $request)
    {
        $this->validate($request , [
            
            'current_password' =>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'password' =>'required|min:6|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'password_confirmation' =>'required|same:password',
            ],

            [
            'current_password.min'=> 'The confirm password must be at least 6 characters',
            'password.min'=> 'The confirm password must be at least 6 characters',
            'password_confirmation.same' => 'The password and confirm password must be the same',
            'current_password.regex' => 'Your password must contain one uppercase and one lowercase letters and one number',
            'password.regex' => 'Your password must contain one uppercase and one lowercase letters and one number',
            ]);
        
        if ($request->current_password == $request->password){
            return Redirect::back()->with('samepassword', 'Current password and new password should not be the same, please try again.');
        }
        else{
            $user = Auth::user();
            if (Hash::check($request->current_password, $user->password)) {
                $user->password=Hash::make($request['password']);
                $user->update();
                return redirect('/my_account')->with('success', 'Your password has successfully changed !');
            }
            else{
                return Redirect::back()->with("warning","Your current password do not match our record, please enter yout current password correctly");
            }
        }
    }
}