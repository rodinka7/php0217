@extends('admin.layouts.app')

@section('title', 'Панель управления')
@section('content')
<div class="content-top">
    <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
    <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
  </div>
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Последние товары</div>
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
      <a href="/admin/good/create" class="btn btn-blue">Создать товар</a>
      <div class="products-columns">
      @foreach ($goods as $good)
        <div class="products-columns__item">
          <div class="products-columns__item__title-product"><a href="admin/good/{{ $good->id }}" class="products-columns__item__title-product__link">{{ $good->name }}</a></div>
          <div class="products-columns__item__thumbnail"><a href="admin/good/{{ $good->id }}" class="products-columns__item__thumbnail__link"><img src="img/cover/{{ $good->image }}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
          <div class="products-columns__item__description"><span class="products-price">{{ $good->price }} руб</span><a href="admin/good/{{ $good->id }}" class="btn btn-blue">Редактировать</a></div>
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