<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts/login');
});

Route::get('/register', function () {
    return view('layouts/register');
});

Route::get('/login', function () {
    return view('layouts/login');
});

Route::get('/home', function () {
    return view('layouts/home');
});

Route::get('/create_post', function () {
    return view('layouts/create_post');
});

Route::get('/postsuccess', function () {
    return view('layouts/postsuccess');
});

Route::get('/upload', function () {
	return view('layouts/upload_article');
});


//Auth::routes();

Route::post('/register_action','RegisterController@store');
Route::post('/login_check','LoginController@postlogin');
Route::post('/create_post','PostController@store');
Route::get('/logout','LoginController@user_logout')->middleware("auth");
