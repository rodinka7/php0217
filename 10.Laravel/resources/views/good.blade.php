@extends('layouts.master')

@section('title', $good->name)
@section('content')
<div class="content-top">
    <div class="content-top__text">Купить игры недорого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
    <div class="image-container"><img src="/img/slider.png" alt="Image" class="image-main"></div>
  </div>
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">{{ $good->name }}</div>
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
      <div class="product-container">
        <div class="product-container__image-wrap"><img src="/img/cover/{{ $good->image }}" class="image-wrap__image-product"></div>
        <div class="product-container__content-text">
          <div class="product-container__content-text__title">{{ $good->name }}</div>
          <div class="product-container__content-text__price">
            <div class="product-container__content-text__price__value">
              Цена: <b>{{ $good->price }}</b>
              руб
            </div><a href="" id="orderBtn" class="btn btn-blue">Купить</a>
          </div>
          <div class="product-container__content-text__description">
            <p>
              {{ $good->description }}
            </p>
          </div>
        </div>
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
<div id="formContainer" class="formContainer">
  <form action="post" id="form">
    {{csrf_field()}}
    <input type="hidden" name="good_id" value="{{$good->id}}">
    <input type="hidden" name="price" value="{{$good->price}}">
    <input type="text" name="name" placeholder="Your name">
    <input type="text" name="email" placeholder="Your email" value="@if (Auth::check()){{ Auth::user()->email }}@endif">
    <input type="button" id="btnSubmit" class="btn btn-blue" value="Order">
    <input type="button" id="btnClose" class="btn btn-blue" value="Close">
  </form>
  <div id="message"></div>
</div>
@endsection