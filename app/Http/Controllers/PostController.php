<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use View;
use DB;
use Redirect;
use Auth;
use File;
use Storage;
use App\Post;
use App\Registered_user;

class PostController extends Controller
{

    public function storesellerpost(request $request){

      //var_dump($request['image']); //Check data input

      //Validate post information
      $this->validate($request, [
        'itemcategory' =>'required',
        'price' =>'required|numeric',
        'Ptitle' =>'required|max:50',
        'description' =>'required',
        'image' => 'required|image|mimes:jpeg,jpg,png'
        ]
        ,[
        'price.numeric' => 'Please offer a price in numeric form',
        'Ptitle.max'=> 'Your title is too long, please write your title within 50 characters',
        ]);

      //Store image in path://storage/app/public
      $image = $request->file('image');
      $filename = Auth::user()->username . '_' . time() . '.' . $image->extension();
      storage::disk('public')->put($filename, File::get($image));

      //store post into Post table
      $post = new Post();
      $post->item_category = $request['itemcategory'];
      $post->username = Auth::user()->username;
      $post->usertype = Auth::user()->usertype;
      $post->price = $request['price'];
      $post->title = $request['Ptitle'];
      $post->description = $request['description'];
      $post->image = $filename;
      $request->user()->posts()->save($post);
      //return redirect::to("/home")->with('create_post_success','Congratulations! Your post has been created!');
      return redirect::to("index");
    }

    public function storebuyerpost(request $request){
    
          //var_dump($request['image']); //Check data input
    
          //Validate post information
          $this->validate($request, [
            'itemcategory' =>'required',
            'Ptitle' =>'required|max:50',
            'description' =>'required',
            'Ptitle.max'=> 'Your title is too long, please write your title within 50 characters',
        ]);
    
          //store post into Post table
          $post = new Post();
          $post->item_category = $request['itemcategory'];
          $post->username = Auth::user()->username;
          $post->usertype = Auth::user()->usertype;
          $post->title = $request['Ptitle'];
          $post->description = $request['description'];
          $request->user()->posts()->save($post);
          //return redirect::to("/home")->with('create_post_success','Congratulations! Your post has been created!');
          return redirect::to("index");
        }

    public function edit(request $request)
    {


    }

    public function index()
    {
     $sellerposts=DB::table('posts')->where('usertype', 'Seller')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts], ['buyerposts'=>$buyerposts]);
     //return $buyerposts;
    }


    public function search(request $request)
    {

    }

    public function display_meat()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'meat')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'meat')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts], ['buyerposts'=>$buyerposts]);
    }

    public function display_milk()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'milk')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'milk')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts], ['buyerposts'=>$buyerposts]);
    }

    public function display_fruit()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'fruit')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'fruit')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts], ['buyerposts'=>$buyerposts]);
    }

    public function display_vegetable()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'vegetable')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'vegetable')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts], ['buyerposts'=>$buyerposts]);
    }

    public function display_cheese()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'cheese')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'cheese')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts], ['buyerposts'=>$buyerposts]);
    }

    public function display_wine()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'wine')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'wine')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts], ['buyerposts'=>$buyerposts]);
    }

    public function display_grain()
    {
     $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'grain')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'grain')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts], ['buyerposts'=>$buyerposts]);
    }

    public function show_description(request $request)
    {
      //$description=Post::find($request->Postid);
      $post = DB::table('posts')->where('Post_id', $request->Post_id)->join('registered_users', 'posts.username', '=', 'registered_users.username')->get();
      $thispost = $post[0];
   
      return view("layouts/description", ['description'=>$thispost]);
    }

}
