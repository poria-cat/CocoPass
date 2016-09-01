<?php

namespace App\Http\Controllers;

use App\Password;
use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;

class PasswordController extends Controller
{
    //
    public function store_password(Request $request)
    {
        $password_data=[
            'password_name'=>$request->input('my_password_name'),
            'user_name'=>$request->input('my_password_user_name'),
            'password'=>$request->input('my_password_password'),
            'website_url'=>$request->input('my_password_website_url'),
            'remark'=>$request->input('my_password_remark'),
            'user_id'=>\Auth::user()->id
        ];
        $password_id = Password::create(array_merge($password_data))->id;
        $tag_data = [
            'tag'=>$request->input('my_password_tag'),
            'user_id'=>\Auth::user()->id,
            'password_id'=>$password_id
        ];
        Tag::create(array_merge($tag_data));

        return redirect('/home');
    }
}
