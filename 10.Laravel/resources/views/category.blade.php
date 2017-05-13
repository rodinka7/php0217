@extends('layouts.master')
@section('title', $category_name)

@section('content')
  <div class="content-top">
    <div class="content-top__text">Купить игры недорого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
    <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
  </div>
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Игры в разделе {{ $category_name }}</div>
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
      <div class="products-category__list">
      @foreach ($goods as $good)
        <div class="products-category__list__item">
          <div class="products-category__list__item__title-product"><a href="/good/{{ $good->id }}">{{ $good->name }}</a></div>
          <div class="products-category__list__item__thumbnail"><a href="/good/{{ $good->id }}" class="products-category__list__item__thumbnail__link"><img src="/img/cover/{{ $good->image }}" alt="Preview-image"></a></div>
          <div class="products-category__list__item__description"><span class="products-price">{{ $good->price }} руб.</span><a href="/good/{{ $good->id }}" class="btn btn-blue">Купить</a></div>
        </div>
       @endforeach
      </div>
    </div>
    <div class="content-footer__container">
    {{ $goods->render() }}
    </div>
  </div>
  <div class="content-bottom"></div>
@endsection