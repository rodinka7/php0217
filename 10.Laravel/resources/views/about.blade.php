@extends('layouts.master')
@section('title', 'О компании')
@section('content')
<div class="content-top">
    <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
    <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
  </div>
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">О магазине</div>
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
      <div class="news-block content-text"><img src="/img/cover/00998ad6443ab886176940c6053d5eb5.jpg" alt="Image" class="alignleft img-news">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
        </p>
        <p>
          non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          exercitation ullamco laboris nisi ut aliquip
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
          non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
          ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
          non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem
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
         @foreach ($random_goods as $oneGood)
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