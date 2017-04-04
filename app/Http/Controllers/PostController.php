<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use Auth;
use File;
use Storage;
use App\Post;

class PostController extends Controller
{
    public function store(request $request){

    	//var_dump($request['image']); //Check data input

    	//Validate post information
    	$this->validate($request, [
    		'itemcategory' =>'required',
    		'price' =>'required|numeric',
    		'Ptitle' =>'required|max:50',
    		'description' =>'required',
  		 	'image' => 'required|image|mimes:jpeg,jpg,png',
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
   		$post->price = $request['price'];
   		$post->title = $request['Ptitle'];
   		$post->description = $request['description'];
   		$post->image = $filename;
   		$request->user()->posts()->save($post);
   		return redirect::to("/home")->with('create_post_success','Congratulations! Your post has been created!');
    }

    public function edit(request $request)
    {


    }

}
