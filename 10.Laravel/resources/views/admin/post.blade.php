@extends('layouts.master')
@section('title', $post->name)
@section('content')
<div class="content-top">
    <div class="content-top__text">Панель управления</div>
    <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
  </div>
  <div class="content-middle clearfix">
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
      <div class="news-block content-text">
        <form class="edit-container__form" method="post" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="product-container__image-wrap">
            <img src="/img/news/{{ $post->image }}" alt="Image" class="alignleft img-news">
            Изменить изображение:
            <input type="file" name="image">
          </div>
           <div class="edit-container__form_container">
             <input type="text" class="edit-container__form__input" name="title" value="{{ $post->name }}">
             <div class="edit-container__form_wrapper">
                <textarea class="edit-container__form__textarea" name="description">{{ $post->description }}</textarea>
             </div>
             <div class="edit-container__form_wrapper">
                <button type="submit" class="btn btn-blue">Сохранить</button>
                <a href="/admin/posts/delete/{{ $post->id }}" class="btn btn-blue">Удалить</a>
              </div>
           </div>
        </form>
      </div>
    </div>
  </div>

  <div class="content-bottom">
    <div class="line"></div>
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
      </div>
    </div>
    <div class="content-main__container">
      <div class="products-columns">
        @foreach ( $random_goods as $oneGood )
        <div class="products-columns__item">
          <div class="products-columns__item__title-product"><a href="/admin/good/{{ $oneGood->id }}" class="products-columns__item__title-product__link">{{ $oneGood->name }}</a></div>
          <div class="products-columns__item__thumbnail"><a href="/admin/good/{{ $oneGood->id }}" class="products-columns__item__thumbnail__link"><img src="/img/cover/{{ $oneGood->image }}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
          <div class="products-columns__item__description"><span class="products-price">{{ $oneGood->price }} руб</span><a href="/admin/good/{{ $oneGood->id }}" class="btn btn-blue">Редактировать</a></div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection