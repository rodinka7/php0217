@extends('admin.layouts.app')
@section('title', 'Редактирование товаров')
@section('content')
<div class="content-top">
    <div class="content-top__text">Панель управления</div>
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
        <form class="edit-container__form" method="post" action="/admin/good/{{ $good->id }}" enctype="multipart/form-data">
          {{ csrf_field() }}
	        <div class="product-container__image-wrap">
            <img src="/img/cover/{{ $good->image }}" class="image-wrap__image-product">
            Изменить изображение:
            <input type="file" name="image">
          </div>
	        <div class="product-container__content-text">
		          <div class="product-container__content-text__title"><input type="text" class="edit-container__form__input" name="title" value="{{ $good->name }}"></div>
		          <div class="product-container__content-text__price">
		            <div class="product-container__content-text__price__value">
		              Цена: <input type="text" class="edit-container__form__input" name="price" value="{{ $good->price }}">
		              руб
		            </div><button type="submit" class="btn btn-blue">Сохранить</button>
		          </div>
		          <div class="product-container__content-text__description">
		            <textarea class="edit-container__form__textarea" name="description">{{ $good->description }}</textarea>
		          </div>
      			<a href="/admin/good/delete/{{ $good->id }}" class="btn btn-blue">Удалить</a>
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
        @foreach ($random_goods as $oneGood)
        <div class="products-columns__item">
          <div class="products-columns__item__title-product"><a href="/good/{{ $oneGood->id }}" class="products-columns__item__title-product__link">{{ $oneGood->name }}</a></div>
          <div class="products-columns__item__thumbnail"><a href="/good/{{ $oneGood->id }}" class="products-columns__item__thumbnail__link"><img src="/img/cover/{{ $oneGood->image }}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
          <div class="products-columns__item__description"><span class="products-price">{{ $oneGood->price }} руб</span><a href="/admin/good/{{ $oneGood->id }}" class="btn btn-blue">Редактировать</a></div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection