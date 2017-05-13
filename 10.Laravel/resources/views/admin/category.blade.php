@extends('admin.layouts.app')
@section('title', 'Редактирование категории')
@section('content')
<div class="content-top">
    <div class="content-top__text">Панель управления</div>
    <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
  </div>
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Игры в разделе {{ $category->name }}</div>
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
		<form class="create-container__form" method="post" action="/admin/category/{{ $category->id }}" enctype="multipart/form-data">
	      {{ csrf_field() }}
	       <div class="product-container__content-text__title"> 
            <input type="text" class="edit-container__form__input" name="title" placeholder="Введите название категории" value="{{ $category->name }}">
          </div>
          <div class="product-container__create__description">
            <textarea class="edit-container__form__textarea" name="description">{{ $category->description }}</textarea>
          </div>
          <button type="submit" class="btn btn-brown">Сохранить</button>
          <a href="/admin/category/delete/{{ $category->id }}" class="btn btn-brown">Удалить</a>
          <a href="/admin/create/category" class="btn btn-brown">Создать категорию</a>
	    </form>  
      <div class="products-category__list">
      @foreach ($goods as $good)
        <div class="products-category__list__item">
          <div class="products-category__list__item__title-product"><a href="/admin/good/{{ $good->id }}">{{ $good->name }}</a></div>
          <div class="products-category__list__item__thumbnail"><a href="/admin/good/{{ $good->id }}" class="products-category__list__item__thumbnail__link"><img src="/img/cover/{{ $good->image }}" alt="Preview-image"></a></div>
          <div class="products-category__list__item__description"><span class="products-price">{{ $good->price }} руб.</span><a href="/admin/good/{{ $good->id }}" class="btn btn-blue">Редактировать</a></div>
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