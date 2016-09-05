<?php

namespace App\Http\Controllers;

use App\Password;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;

class PasswordController extends Controller
{
    //
//    protected $encrypt;
//    public function __construct(Encrypt\encrypt $encrypt)
//    {
//        $this->encrypt = $encrypt;
//    }



    public function store_password(Request $request)
    {
        $password_data=[
            'password_name'=>$request->input('my_password_name'),
            'user_name'=>\Crypt::encrypt($request->input('my_password_user_name')),
            'encrypt_password'=>\Crypt::encrypt($request->input('my_password_password')),
            'website_url'=>$request->input('my_password_website_url'),
            'remark'=>$request->input('my_password_remark'),
            'user_id'=>\Auth::user()->id
        ];


        Password::create(array_merge($password_data))->id;

        return redirect('/home');
    }
}
