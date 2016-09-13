@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome to CocoPass</div>

                    <div class="panel-body">
                        <p>You can store your passwords here</p>
                    </div>
                </div>
                <ul class="list-group" >
                    @foreach($passwords as $password)
                        <li class="list-group-item" >
                            {{$password->password_name}}
                            <div class="dropdown pull-right">
                                <button id="dLabel" class="btn btn-sm btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    copy
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                                    <li class="clip-text" data-clipboard-text="{{$password->encrypt_password}}"><a href="javascript:void(0);">copy password</a></li>
                                    <li class="clip-text" data-clipboard-text="{{$password->user_name}}"><a href="javascript:void(0);">copy username</a></li>
                                    <li ><a  class="edit_your_password" data-toggle="modal" data-target="#myModal"  data-id="{{$password->id}}" data-name="{{$password->password_name}}" data-username="{{$password->user_name}}" data-password="{{$password->encrypt_password}}" data-url="{{$password->website_url}}" data-remark="{{$password->remark}}">edit</a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                    <div class="text-center">
                        {{$passwords->links()}}
                    </div>
                </ul>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">edit</h4>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="/store_password" accept-charset="UTF-8">
                                    {{ csrf_field() }}
                                    <input type="hidden" class="my_password_id">
                                    <input type="hidden" class="my_password_user_id">

                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input type="text" name="my_password_name" class="form-control my_password_name" >
                                    </div>

                                    <div class="form-group">
                                        <label  class="control-label">User Name:</label>
                                        <input type="text" name="my_password_user_name" class="form-control my_password_user_name" >
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label">Password:</label>
                                        <input type="password" name="my_password_password" class="form-control my_password_password" >
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label">Website Url:</label>
                                        <input type="text" name="my_password_website_url" class="form-control my_password_website_url" >
                                    </div>
                                    <div class="form-group">
                                        <label  class="control-label">Remark:</label>
                                        <input type="text" name="my_password_remark" class="form-control my_password_remark" >
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary edit">Save changes</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/clip.js"></script>
    <script>
        new Clipboard('.clip-text');
        $('.edit_your_password').click(function(){
            var id = $(this).data('id');
            var name = $(this).data('name');
            var username = $(this).data('username');
            var password = $(this).data('password');
            var url = $(this).data('url');
            var remark = $(this).data('remark');
            $('.my_password_id').val(id);
            $('.my_password_name').val(name);
            $('.my_password_user_name').val(username);
            $('.my_password_password').val(password);
            $('.my_password_website_url').val(url);
            $('.my_password_remark').val(remark);
        })
        $('.edit').click(function(){
            $.ajax({
                type: "POST",
                url: "/edit_password",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    id: $('.my_password_id').val(),
                    name: $('.my_password_name').val(),
                    username: $('.my_password_user_name').val(),
                    password: $('.my_password_password').val(),
                    url: $('.my_password_website_url').val(),
                    remark: $('.my_password_remark').val()
                },
                success: function () {
                    window.location.reload();
                }
            })
        })

    </script>
@endsection
