<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use App\Post;
use App\Registered_user;
use App\user_preference;

class AdminController extends Controller
{
    public function index()
    {
    	$totaluser = Registered_user::count();
    	$totalpost = Post::count();
    	return view('admin/index', ['totaluser'=>$totaluser, 'totalpost'=>$totalpost]);
    }

    public function getUsers()
    {
    	$users = DB::table('registered_users')->get();
    	return view('/admin/user_table', ['users'=>$users]);
    }

    public function getPosts()
    {
    	$posts = DB::table('posts')->get();
    	return view('/admin/post_table', ['posts'=>$posts]);
    }

    public function destroy_post(request $request)
    {
    	Post::where('Post_id', $request->Post_id)->delete();
    	return Redirect::back();
    }

    public function destroy_user(request $request)
    {
    	Registered_user::where('username', $request->username)->delete();
    	user_preference::where('username', $request->username)->delete();
    	return Redirect::back();
    }
}
