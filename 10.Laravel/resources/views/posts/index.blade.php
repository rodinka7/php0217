@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Posts</div>
              	<div>
              		<a href="/posts/create" class="btn">Создать пост</a>
              	</div>
                <div class="panel-body">
                    @foreach ($posts as $post)
						<li>{{ $post->title }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
