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
            ],

            [
            'password.min'=> 'The confirm password must be at least 6 characters',
            'cpassword.same' => 'The password and confirm password must be the same',
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

            $preference = new user_preference();
            $preference->username=$request['username'];
            $preference->preference_1=$request['preference_1'];
            $preference->preference_2=$request['preference_2'];
            $preference->preference_3=$request['preference_3'];

            $preference->save();


        	return Redirect::to('login')->with('success','Congratulations! Your account has successfully registered!');
    	}

    public function show_userprofile(request $request)
    {
        $user = Registered_user::where('username', $request->username)->get();
        $posts = Post::where('username', $request->username)->latest()->paginate(5);
        $thisuser = $user[0];
        //return $posts;
        return view("layouts/userdetail", ['user'=>$thisuser], ['posts'=>$posts]);

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

    public function admin_credential_rules(array $data)
    {
      $messages = [
        'current-password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'current-password' => 'required',
        'password' => 'required|same:password',
        'password-confirmation' => 'required|same:password',     
      ], $messages);

      return $validator;
    }  

    public function postCredentials(Request $request)
    {
      if(Auth::Check())
      {
        $request_data = $request->All();
        $validator = $this->admin_credential_rules($request_data);
        if($validator->fails())
        {
          return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }
        else
        {
          $current_password = Auth::User()->password;           
          if(Hash::check($request_data['current-password'], $current_password))
          {           
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save(); 
            return "ok";
          }
          else
          {           
            $error = array('current-password' => 'Please enter correct current password');
            return response()->json(array('error' => $error), 400);   
          }
        }     
      }
      else
      {
        return redirect()->to('/');
      }    
    }
    

}