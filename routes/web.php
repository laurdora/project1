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

Route::get('/edit_post', function () {
    return view('layouts/edit_post');
});

Route::get('/my_account', function () {
    return view('layouts/my_account');
});

Route::get('/edit_profile', function () {
    return view('layouts/edit_profile');
});

Route::get('/change_password', function () {
    return view('layouts/change_password');
});


//Auth::routes();

Route::post('/register_action','RegisterController@store');
Route::post('/login_check','LoginController@postlogin');
Route::post('/create_post','PostController@store');
Route::get('/logout','LoginController@user_logout')->middleware("auth");
