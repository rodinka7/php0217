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

Route::get('/', 'GoodController@index');
Route::get('/category/{id}', 'CategoryController@index');
Route::get('/good/{id}', 'GoodController@store');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@store');
Route::get('/about', 'AboutController@index');
Route::post('/search', 'GoodController@search');

Route::get('/logout', 'homeController@logout');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/orders', 'OrderController@index');
	Route::post('/orders/show', 'OrderController@store');
	Route::get('/orders/delete/{id}', 'OrderController@destroy');
});

Route::group(['prefix' => 'admin', 'middleware' => 'RoleAdmin'], function(){
	Route::get('/', 'GoodController@admin');

	Route::get('/good/{id}', 'GoodController@storeGood');
	Route::post('/good/{id}', 'GoodController@update');
	Route::get('/good/delete/{id}', 'GoodController@destroy');
	Route::get('/create/good', 'GoodController@create');
	Route::post('/create/good', 'GoodController@updateGood');

	Route::get('/posts', 'PostController@storePosts');
	Route::get('/posts/{id}', 'PostController@storePost');
	Route::post('/posts/{id}', 'PostController@update');
	Route::get('/posts/delete/{id}', 'PostController@destroy');
	Route::get('/create/post', 'PostController@create');
	Route::post('/create/post', 'PostController@updatePost');

	Route::get('/category/{id}', 'CategoryController@store');
	Route::post('/category/{id}', 'CategoryController@update');
	Route::get('/category/delete/{id}', 'CategoryController@destroy');
	Route::get('/create/category', 'CategoryController@create');
	Route::post('create/category', 'CategoryController@updateCategory');
});


Auth::routes();

?>