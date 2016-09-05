@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/lock.css">
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
               <div class="text-center" >
                   <h3>解锁</h3>
                   <i class="iconfont">&#xe61b;</i>
               </div>
                <form method="post" action="/after_unlock" accept-charset="UTF-8" class="unlock hidden">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label">输入解锁密码</label>
                        <input type="text" name="my_encrypt_password" class="form-control" >
                    </div>

                    <input type="submit"  class="btn  btn-block" value="解锁">

                </form>


            </div>
        </div>
    </div>

@endsection
