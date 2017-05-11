<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'GoodController@index');
Route::get('/category/{id}', 'CategoryController@index');
Route::get('/good/{id}', 'GoodController@store');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@store');
Route::get('/about', 'AboutController@index');
Route::post('/search', 'GoodController@search');

Route::get('/logout', 'homeController@logout');
Route::get('/orders', 'OrderController@index');
Route::post('/orders/show', 'OrderController@store');
Route::get('/orders/delete/{id}', 'OrderController@destroy');

Route::get('/admin', 'GoodController@admin');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
	Route::get('/good/{id}', 'GoodController@storeGood');
	Route::post('/good/{id}', 'GoodController@update');
	Route::get('/good/delete/{id}', 'GoodController@destroy');
	Route::get('/create/good', 'GoodController@create');
	Route::post('/create/good', 'GoodController@updateGood');

	Route::get('/posts', 'PostController@storePosts');
	Route::get('/posts/{id}', 'PostController@storePost');
	Route::post('/posts/{id}', 'PostController@update');
	Route::get('/posts/delete/{id}', 'PostController@destroy');
});


Auth::routes();

/*Route::get('/home', 'HomeController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts/store', 'PostController@store');
Route::get('/posts/edit/{id}', 'PostController@edit');
Route::post('/posts/update/{id}', 'PostController@update');
Route::delete('/posts/delete/{id}', 'PostController@delete');

Route::get('/orderlist', 'OrderController@index');*/



