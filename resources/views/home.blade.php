@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">标签</div>

                <div class="panel-body">
                    <span class="label label-default">标签</span>
                </div>
            </div>
            <ul class="list-group" >
                @foreach($passwords as $password)
                <li class="list-group-item" >

                    {{$password->password_name}}

                    {{--_{{$password->user_name}}w{{$password->encrypt_password}}--}}
                    <div class="dropdown pull-right">
                        <button id="dLabel" class="btn btn-sm btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            复制
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu " role="menu" aria-labelledby="dLabel">
                            <li class="clip-text" data-clipboard-text="{{$password->encrypt_password}}"><a href="javascript:void(0);">复制密码</a></li>
                            <li class="clip-text" data-clipboard-text="{{$password->user_name}}"><a href="javascript:void(0);">复制用户名</a></li>
                            <li ><a href="javascript:void(0);">编辑</a></li>
                        </ul>
                    </div>
                </li>
                    @endforeach
            </ul>
        </div>
    </div>
</div>
<script src="/js/clip.js"></script>
<script>
    new Clipboard('.clip-text');
</script>
@endsection
