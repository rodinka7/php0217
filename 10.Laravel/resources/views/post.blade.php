@extends('layouts.master')
@section('title', $post->name)
@section('content')
<div class="content-top">
    <div class="content-top__text">Купить игры недорого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
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
        <h3 class="content-text__title">
          {{ $post->name }}
        </h3><img src="/img/news/{{ $post->image }}" alt="Image" class="alignleft img-news">
        <p>
          {{ $post->description }}
        </p>
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
          <div class="products-columns__item__title-product"><a href="/good/{{ $oneGood->id }}" class="products-columns__item__title-product__link">{{ $oneGood->name }}</a></div>
          <div class="products-columns__item__thumbnail"><a href="/good/{{ $oneGood->id }}" class="products-columns__item__thumbnail__link"><img src="/img/cover/{{ $oneGood->image }}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
          <div class="products-columns__item__description"><span class="products-price">{{ $oneGood->price }} руб</span><a href="/good/{{ $oneGood->id }}" class="btn btn-blue">Купить</a></div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection