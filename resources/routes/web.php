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
Route::get('/upload', function () {
	return view('layouts/upload_article');
});
Route::get('/edit', function () {
	return view('layouts/edit_article');
});

//Auth::routes();

Route::post('/register_action','RegisterController@store');
Route::post('/login_check','RegisterController@postlogin');

Route::get('/logout',function(){
	Auth::logout();
	return Redirect::to('');
})->middleware("auth");
//Route::get('/home', 'HomeController@index');
