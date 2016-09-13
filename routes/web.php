<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@welcome');

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');

    Route::get('/store_password', 'HomeController@store_password');

    Route::post('/store_password','PasswordController@store_password');
    Route::post('/edit_password','PasswordController@edit_password');
});
Route::group(['prefix' => 'admin'],function(){
    Route::get('/login', 'Admin\Auth\LoginController@showLoginForm');
    Route::post('/login', 'Admin\Auth\LoginController@login');
    Route::post('/logout', 'Admin\Auth\LoginController@logout');

    Route::get('/register', 'Admin\Auth\RegisterController@showRegisterForm');
    Route::post('/register', 'Admin\Auth\RegisterController@register');
    Route::get('/', 'Admin\AdminController@index');
    Route::get('/users', 'Admin\AdminController@users');
});

