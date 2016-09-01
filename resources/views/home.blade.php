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
                    @foreach($password->tags as $tag)
                    <span class="badge">{{$tag->tag}}</span>
                    @endforeach
                    {{$password->password_name}}
                </li>
                    @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection
