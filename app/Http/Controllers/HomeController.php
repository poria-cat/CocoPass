<?php

namespace App\Http\Controllers;

use App\Password;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    protected $encrypt;
//
//    public function __construct(Encrypt\encrypt $encrypt)
//    {
//        $this->encrypt = $encrypt;
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome()
    {

        if (Auth::guest()){
            return view('welcome');
        }else{
            return redirect('/home');
        }
    }
    public function index()
    {
        $user_id = \Auth::user()->id;
        $passwords = Password::where('user_id',$user_id)->get();

        return view('home',compact('passwords'));
    }
    public function store_password()
    {
        return view('passwords.store_password');
    }

}
