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

                <form class="create_encrypt_password hidden">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label">加密和解密均要用到此密码，请务必记牢</label>
                        <input type="text" id="my_encrypt_password" class="form-control " >
                    </div>

                    <button  class="btn  btn-block create_encrypt_password_btn" >创建</button>

                </form>

            </div>
        </div>
    </div>
    <script>
        $.getJSON('/encrypt_status',function(data){
            if(data.status==0){
                $(".create_encrypt_password").removeClass('hidden')

            }
            else{
                $(".unlock").removeClass('hidden')

            }
            console.log(data)
        })
        $(".create_encrypt_password_btn").click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/store_encrypt_password",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    my_encrypt_password: $("#my_encrypt_password").val()
                },
                success: function (data) {
                    if(data.status!==200){
                        alert('创建失败')
                    }else {

                        alert("创建成功")

                    }
                },
                error: function () {
                    alert('创建失败')
                }
            })

        })

    </script>

@endsection
