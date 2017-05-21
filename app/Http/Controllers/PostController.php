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
use App\user_preference;
use GuzzleHttp\Client;
use TeamTNT\TNTSearch\Facades\TNTSearch;


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
      $categories = ['meat','milk','fruit','vegetable','cheese','wine','grain'];
      $posts = DB::table('posts')->where('Post_id', $request->Post_id)->get();
      $post = $posts[0];
      return view('layouts/edit_post', ['post'=>$post], ['categories'=>$categories]);
    }

    public function updatesellerpost(request $request)
    {
      //Post::where('Post_id', $request->Post_id)->update();
      
      //Validate post information
      $this->validate($request, [

        'itemcategory' =>'required',
        'price' =>'required|numeric',
        'Ptitle' =>'required|max:50',
        'description' =>'required',
        'image' => 'image|mimes:jpeg,jpg,png'
        ],

        [
        'price.numeric' => 'Please offer a price in numeric form',
        'Ptitle.max'=> 'Your title is too long, please write your title within 50 characters',
        ]); //validate works
      

      //store post into Post table
      $post = Post::where('Post_id',$request->Post_id)->first();
      $post->item_category = $request->itemcategory;
      $post->price = $request->price;
      $post->title = $request->Ptitle;
      $post->description = $request->description;
      if ($request->image !== null)
      {
      Storage::disk('public')->delete($post->image);
      //Store image in path://storage/app/public
      $image = $request->file('image');
      $filename = Auth::user()->username . '_' . time() . '.' . $image->extension();
      storage::disk('public')->put($filename, File::get($image));
      
      $post->image = $filename;
      }
      $post->update();
      return redirect::to("index");
      //->with('post_updated','Congratulations! Your post has been updated!');
    }

    public function updatebuyerpost(request $request)
    {
      //Validate post information
          $this->validate($request, [
            'itemcategory' =>'required',
            'Ptitle' =>'required|max:50',
            'description' =>'required',
            'Ptitle.max'=> 'Your title is too long, please write your title within 50 characters',
        ]); //validate works
    
          //store post into Post table
          $post = Post::where('Post_id',$request->Post_id)->first();
          $post->item_category = $request['itemcategory'];
          $post->title = $request['Ptitle'];
          $post->description = $request['description'];
          $post->update();

      return redirect::to("index");
    }

    public function index()
    {
    $sellerposts=DB::table('posts')->where('usertype', 'Seller')->latest()->paginate(5, ['*'],'page_b');
    $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->latest()->paginate(5, ['*'], 'page_c');
    $interests=user_preference::where('username', Auth::user()->username)->get();
      if ($interests == '[]'){
        return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
      }
      elseif($interests[0]->preference_1 == NUll){
      $interest_posts=DB::table('posts')->where('usertype', 'Seller')->inRandomOrder()->paginate(5,['*'], 'page_a');
      return view("layouts/home", ['interest_posts'=>$interest_posts, 'sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
      }
      else{
      $interest=$interests[0];
      $interest_posts=DB::table('posts')->where('usertype', 'Seller')->wherein('item_category',[$interest->preference_1, $interest->preference_2, $interest->preference_3])->orderByRaw("FIELD(item_category, '$interest->preference_1', '$interest->preference_2', '$interest->preference_3')")->inRandomOrder()->paginate(5,['*'], 'page_a');
      //dd($interest_posts);
      return view("layouts/home", ['interest_posts'=>$interest_posts, 'sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
       //return $buyerposts;
      }
    }


    public function search(request $request)
    {
        $key = $request->q;
        if($query = $request->input('q'))
        {
          TNTSearch::selectIndex("posts.index");
          $query = TNTSearch::search($request->input('q'), 1000);
          $sellerposts=Post::whereIn('Post_id', $query['ids'])->paginate(5, ['*'],'page_a');
          $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->latest()->paginate(5, ['*'], 'page_b');
        }
        else
        {
          $sellerposts=DB::table('posts')->where('usertype', 'Seller')->latest()->paginate(5, ['*'],'page_a');
          $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->latest()->paginate(5, ['*'], 'page_b');
          return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts, 'key'=>$key]);
        }
        return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts, 'key'=>$key]);
    }

    public function display_meat()
    {
    $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'meat')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'meat')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
    }

    public function display_milk()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'milk')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'milk')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
    }

    public function display_fruit()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'fruit')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'fruit')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
    }

    public function display_vegetable()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'vegetable')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'vegetable')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
    }

    public function display_cheese()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'cheese')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'cheese')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
    }

    public function display_wine()
    {
      $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'wine')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'wine')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
    }

    public function display_grain()
    {
     $sellerposts=DB::table('posts')->where('usertype', 'Seller')->where('item_category', 'grain')->latest()->paginate(5, ['*'],'page_a');
     $buyerposts=DB::table('posts')->where('usertype', 'Buyer')->where('item_category', 'grain')->latest()->paginate(5, ['*'], 'page_b');
     return view("layouts/home", ['sellerposts'=>$sellerposts, 'buyerposts'=>$buyerposts]);
    }

    public function show_description(request $request)
    {
      //$description=Post::find($request->Postid);
      $post = DB::table('posts')->where('Post_id', $request->Post_id)->join('registered_users', 'posts.username', '=', 'registered_users.username')->get();
      $thispost = $post[0];
   
      return view("layouts/description", ['description'=>$thispost]);
    }

    public function human_verification(request $request)
    {
      $token = $request->input('g-recaptcha-response');
      if($token){
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
          'form_params' => array(
            'secret' => '6Lc2RCAUAAAAAP73clpEH6artwHRESrvZbz209SX',
            'response' => $token
            )
          ]);
        $result=json_decode($response->getBody()->getContents());
        if ($result->success)
        {
          return Redirect::back()->with('verified', 'success');
        }
        else{
          return Redirect::back();
        }
      }
      else{
          return Redirect::back();
      }
    }

    public function destroy(request $request)
    {
      $post=Post::where('Post_id', $request->Post_id)->first();
      Storage::disk('public')->delete($post->image);
      $post->delete();
      return Redirect::back()->with('post_deleted', 'Your post has been deleted');
    }
}
