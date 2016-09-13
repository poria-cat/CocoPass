@extends('layouts.app')
@section('content')
    <div class="container" >
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-center">储存密码</h3>
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <strong>Warning!</strong>{{ $error }}
                        </div>
                    @endforeach
                @endif
                <form method="post" action="/store_password" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label">名称</label>
                        <input type="text" name="my_password_name" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label  class="control-label">用户名:</label>
                        <input type="text" name="my_password_user_name" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label  class="control-label">密码:</label>
                        <input type="password" name="my_password_password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label  class="control-label">网址:</label>
                        <input type="text" name="my_password_website_url" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label  class="control-label">备注:</label>
                        <input type="text" name="my_password_remark" class="form-control" >
                    </div>

                    <input type="submit"  class="btn  btn-block" value="保存">

                </form>


            </div>
        </div>
    </div>

@endsection
