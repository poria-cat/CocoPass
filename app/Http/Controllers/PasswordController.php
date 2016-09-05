<?php

namespace App\Http\Controllers;

use App\Password;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use PragmaRX\Google2FA\Contracts\Google2FA;

class PasswordController extends Controller
{
    //
//    protected $encrypt;
//    public function __construct(Encrypt\encrypt $encrypt)
//    {
//        $this->encrypt = $encrypt;
//    }


    public function unlock()
    {
        $user = User::find(\Auth::user()->id);
//
//        $user->google2fa_secret = \Google2FA::generateSecretKey();
//
//        $user->save();
        $google2fa_url = \Google2FA::getQRCodeGoogleUrl(
            'MyPassword',
            $user->email,
            $user->google2fa_secret
        );

        return view('passwords.unlock',compact($google2fa_url));
    }
    public function generateKey(Google2FA $google2fa)
    {
        return $google2fa->generateSecretKey();
    }

    public function after_unlock(Request $request)
    {
        $encrypt_password = $request->input('my_encrypt_password');
        if(password_verify($encrypt_password,\Auth::user()->encrypt_password)){
            session(['encrypt_password'=>$encrypt_password]);
            return redirect('/home');
        }else{
            return redirect('/unlock');

        }

    }
    public function encrypt_status()
    {
        if (\Auth::user()->encrypt_password!==0){
            return \Response([
                'status'=>1
            ]);
        }else{
            return \Response([
                'status'=>0
            ]);
        }

    }

    public function store_encrypt_password(Request $request)
    {
        if (\Auth::user()->encrypt_password!==0){
            return \Response([
                'status'=>500
            ]);

        }else{
            $password = $request->input('my_encrypt_password');
            $user = User::find(\Auth::user()->id);
            $user->encrypt_password = bcrypt($password);
            $user->save();
            return \Response([
                'status'=>200
            ]);
        }


    }
    public function store_password(Request $request)
    {
//        return $this->encrypt->encrypt($originalString, $k);
//        $key = $request->session()->get('encrypt_password');
        $password_data=[
            'password_name'=>$request->input('my_password_name'),
//            'user_name'=>$this->encrypt->encrypt($request->input('my_password_user_name'),$key),
//            'password'=>$this->encrypt->encrypt($request->input('my_password_password'),$key),
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
