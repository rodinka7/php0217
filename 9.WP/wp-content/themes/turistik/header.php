<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>Главная страница</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/libs.min.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/media.css">
  </head>
  <body>
    <div class="wrapper">
      <header class="main-header">
        <div class="top-header">
          <div class="top-header__wrap">
            <div class="logotype-block">
              <div class="logo-wrap"><a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.svg" alt="Логотип" class="logo-wrap__logo-img"></a></div>
            </div>
            <nav class="main-navigation">
              <?php wp_nav_menu([
                  'menu'            => 'menu',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее 
                                      // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
                  'container'       => false,           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
                  'menu_class'      => 'nav-list',          // (string) class самого меню (ul тега)
                  'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
                  'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
                  'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
                  'theme_location'  => ''               // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
                ]); 
              ?>
              <ul class="nav-list">
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">Главная</a></li>
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">Полезная информация</a></li>
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">Последние акции</a></li>
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">О сервисе</a></li>
                <li class="nav-list__nav-item"><a href="#" class="nav-list__nav-item__nav-link">Новости</a></li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="bottom-header">
          <div class="search-form-wrap">
            <form class="search-form">
              <input type="text" placeholder="Поиск..." class="search-form__input">
              <button class="search-form__btn-search"><i class="icon icon-search"></i></button>
            </form>
          </div>
        </div>
      </header>
