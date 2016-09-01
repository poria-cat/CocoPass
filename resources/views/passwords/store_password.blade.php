@extends('layouts.app')
@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>储存密码</h3>
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
                        <input type="text" name="my_password_password" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label  class="control-label">网址:</label>
                        <input type="text" name="my_password_website_url" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label  class="control-label">备注:</label>
                        <input type="text" name="my_password_remark" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label  class="control-label">标签:</label>
                        <input type="text" name="my_password_tag" class="form-control" >
                    </div>
                    <input type="submit"  class="btn  btn-block" value="保存">

                </form>


            </div>
        </div>
    </div>

@endsection
