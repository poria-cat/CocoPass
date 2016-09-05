<?php

namespace App\Http\Controllers;

use App\Password;
use Illuminate\Http\Request;

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


//4 => ""
//5 => "user_id"
//$cars = array
//(
//array("Volvo",22,18),
//array("BMW",15,13),
//array("Saab",5,2),
//array("Land Rover",17,15)
//);
    public function index()
    {
////        $key = $request->session()->get('encrypt_password');
//        $decrypt = [];
        $user_id = \Auth::user()->id;
        $passwords = Password::where('user_id',$user_id)->get();
//        foreach ($passwords as $password){
//            $user_name = $this->encrypt->decrypt($password->user_name,$key);
//            $decrypt_password = $this->encrypt->decrypt($password->password,$key);
//            array_push($decrypt,array('user_name'=>$user_name,'password'=>$decrypt_password,'password_name'=>$password->password_name,'website_url'=>$password->website_url,'remark'=>$password->remark));
//
//
////            encrypt
////            dd($this->encrypt->encrypt('1234567890123567',$key));
////
////            dd($this->encrypt->decrypt($password->user_name,$key));
//
//        }
////        dd($password->toArray());
//
////        dd(collect($decrypt)->flatten(1));
//
////        $decrypt = collect($decrypt)->flatten(1);
//        $t ='';
////        return $this->encrypt->decrypt('maOpFgjqu/XUbfNA1gfMXeQLGDokXzi0SvmOtN7yv8A=',$key);


        return view('home',compact('passwords'));
    }
    public function store_password()
    {
        return view('passwords.store_password');
    }
}
