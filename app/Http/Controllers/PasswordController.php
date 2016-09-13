<?php

namespace App\Http\Controllers;

use App\Password;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class PasswordController extends Controller
{
    //
//    protected $encrypt;
//    public function __construct(Encrypt\encrypt $encrypt)
//    {
//        $this->encrypt = $encrypt;
//    }



    public function store_password(Requests\StorePasswordRequest $request)
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
    public function edit_password(Requests\StorePasswordRequest $request)
    {
        $id = $request->input('id');
        $password = Password::find($id);
        if (Auth::user()->id !== $password->user_id){
            return response()->json(['msg'=>'A bad operation']);
        }else{
            $password->password_name = $request->input('name');
            $password->user_name = \Crypt::encrypt($request->input('username'));
            $password->encrypt_password = \Crypt::encrypt($request->input('password'));
            $password->website_url = $request->input('url');
            $password->remark = $request->input('remark');
            $password->save();
            return response()->json(['msg'=>'Success!']);

        }
    }
}
