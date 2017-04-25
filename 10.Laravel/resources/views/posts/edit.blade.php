@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                </div>
                <div class="panel-body">
                   <form action="/posts/update/{{ $post->id }}" method="post">
                     {{ csrf_field() }}
                     <input type="text" name="title" class="form-control" style="margin-bottom: 10px;" value="{{ $post->title }}"/>
                     <textarea name="content" cols="30" rows="10" class="form-control" style="margin-bottom: 10px;" >{{ $post->content }}</textarea>
                     <input type="submit" class="form-control" />
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection