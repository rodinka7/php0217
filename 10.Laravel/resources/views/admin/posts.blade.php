@extends('admin.layouts.app')
@section('title', 'Редактирование поста')
@section('content')
<div class="content-top">
    <h3 class="title">Панель управления</h3>
    <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
  </div>
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Новости</div>
      </div>
      <div class="content-head__search-block">
        <div class="search-container">
          <form class="search-container__form" method="POST" action="/search">
           {{ csrf_field() }}
            <input type="text" name="search" class="search-container__form__input">
            <button class="search-container__form__btn" type="submit">search</button>
          </form>
        </div>
      </div>
    </div>
    <div class="content-main__container">
	@foreach($posts as $post)
      <div class="news-list__container">
        <div class="news-list__item">
          <div class="news-list__item__thumbnail"><img src="/img/news/{{ $post->image }}"></div>
          <div class="news-list__item__content">
            <div class="news-list__item__content__news-title">{{ $post->name }}</div>
            <div class="news-list__item__content__news-date">{{ $post->created_at }}</div>
            <div class="news-list__item__content__news-content">
            	{{ $post->description }}
            </div>
          </div>
          <div class="news-list__item__content__news-btn-wrap"><a href="/admin/posts/{{ $post->id }}" class="btn btn-brown">Редактировать</a></div>
        </div>
      </div>
    @endforeach
    <a href="/admin/create/post" class="btn btn-brown">Создать пост</a>
    </div>
  </div>
  <div class="content-bottom"></div>
@endsection