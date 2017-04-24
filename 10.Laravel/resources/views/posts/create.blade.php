@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>

                <div class="panel-body">
                   <form action="/posts/store" method="post">
                     {{ csrf_field() }}
                     <input type="text" name="title" class="form-control" style="margin-bottom: 10px;" />
                     <textarea name="content" cols="30" rows="10" class="form-control" style="margin-bottom: 10px;" ></textarea>
                     <input type="submit" class="form-control" />
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection