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

//Auth Middleware
Route::group(['middleware' => 'auth'], function(){
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

    Route::post('Update_user', 'RegisterController@update');

    Route::get('/edit_profile', 'RegisterController@edit_profile');

    Route::get('/change_password', function () {
    return view('layouts/change_password');
    });

    Route::get('/description', function () {
    return view('layouts/description');
    });

//RegisterController route
    Route::post('/register_action','RegisterController@store');
    Route::get('/userdetail', 'RegisterController@show_userprofile');
    Route::post('/update_user', 'RegisterController@update');
    Route::delete('/delete_user', 'RegisterController@destroy');
    Route::post('/passwordUpdate', 'RegisterController@change_password');

//LoginController route
    Route::get('/logout','LoginController@user_logout');

//Postcontroller route
    Route::get('/index','PostController@index')->name('index');
    Route::get('/search', ['uses' => 'PostController@search', 'as' => 'search']);
    Route::post('/create_sellerpost','PostController@storesellerpost');
    Route::post('/create_buyerpost','PostController@storebuyerpost');
    Route::get('/filtercontent_meat','PostController@display_meat');
    Route::get('/filtercontent_milk','PostController@display_milk');
    Route::get('/filtercontent_fruit','PostController@display_fruit');
    Route::get('/filtercontent_vegetable','PostController@display_vegetable');
    Route::get('/filtercontent_cheese','PostController@display_cheese');
    Route::get('/filtercontent_wine','PostController@display_wine');
    Route::get('/filtercontent_grain','PostController@display_grain');
    Route::get('/view_description', 'PostController@show_description');
    Route::post('/human_verfication', 'PostController@human_verification');
    Route::post('/edit_post', 'PostController@edit');
    Route::post('/edit_buyerpost','PostController@updatebuyerpost');
    Route::post('/edit_sellerpost','PostController@updatesellerpost');
    Route::delete('/delete_post', 'PostController@destroy');

});

//Guest Middleware
Route::group(['middleware' => 'guest'], function(){
    Route::get('/', function () {
    return view('layouts/login');
    })->name('user.login');

    Route::get('/register', function () {
    return view('layouts/register');
    });

    Route::get('/login', function () {
    return view('layouts/login');
    })->name('user.login');

    Route::post('/login_check','LoginController@postlogin');
});

//Admin Middleware
Route::group(['middleware' => 'auth:admin'], function(){
    Route::get('/admin_logout', 'Auth\AdminLoginController@logout');
    Route::get('/admin/home', 'AdminController@index')->name('admin.home');
    Route::get('/admin/home/table_users', 'AdminController@getUsers');
    Route::get('/admin/home/table_posts', 'AdminController@getPosts');

    Route::delete('admin/home/admin_deletepost', 'AdminController@destroy_post');
    Route::delete('admin/home/admin_deleteuser', 'AdminController@destroy_user');
});

//Admin guest Middleware
Route::group(['middleware' => 'guest:admin'], function(){

    Route::get('/admin', function() {
    return Redirect::to('/admin/login');
    })->name('admin');

    Route::get('/admin/login', function () {
    return view('auth/adminlogin');
    })->name('admin.login');
    Route::post('/admin/admin_login', 'Auth\AdminLoginController@postlogin');
});

//Auth::routes();






