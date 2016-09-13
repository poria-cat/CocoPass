<?php

namespace App\Http\Controllers\Admin;

use App\Password;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $user_num = count(User::all());
        $password_num = count(Password::all());
        return view('admin.index',compact('user_num','password_num'));
    }

    public function users()
    {
        $users = User::paginate(25);
        return view('admin.users', compact('users'));
    }

}
