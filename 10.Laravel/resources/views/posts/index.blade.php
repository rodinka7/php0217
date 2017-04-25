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
                  <table class="table">
                    @foreach ($posts as $post)
                      <tr>
                        <td>{{ $post->title }}</td>
                        <td><a href="/posts/edit/{{$post->id}}" class="btn">Редактировать пост</a></td>
                        <td>
                          <form action="/posts/delete/{{$post->id}}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <input type="submit" class="btn" value="Удалить пост"/>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
