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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index');

    Route::get('/store_password', 'HomeController@store_password');

    Route::post('/store_password','PasswordController@store_password');
    Route::get('/unlock','PasswordController@unlock');
    Route::post('/after_unlock','PasswordController@after_unlock');
    Route::get('/encrypt_status','PasswordController@encrypt_status');
    Route::post('/store_encrypt_password','PasswordController@store_encrypt_password');



});
//
Route::get('/t',function(\Illuminate\Http\Request $request){
//    return $request->session()->get('encrypt_password').'23333';
    $a ="eyJpdiI6IlNMbHZUUDZaekVEQ08xTlwvZFdiaWZRPT0iLCJ2YWx1ZSI6IlpUdU5wMWNYM1F3MmYzbmwzTnIrYUM4b0hlbGRKeUF6YWpJZ2xYMmVwYmZPcGlrUEJqcHdBS083WlNhdEN3OCsiLCJtYWMiOiI5YTRlN2Y5OTk4OTgzMzFiMzk0MDIxMWRlZjBhZmQ4NDFhNDA2ZjFhMjZhZTUxZWI4OThlOGU0YTlkOWYxYjZlIn0=";
//    return \Illuminate\Support\Facades\Crypt::encrypt('123456');

    return \Illuminate\Support\Facades\Crypt::decrypt($a);
});
Route::get('/g',function(){
    return \Google2FA::generateSecretKey();
});