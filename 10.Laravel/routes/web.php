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
Route::get('/good/{id}', 'GoodController@show');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{id}', 'PostController@show');
Route::get('/about', 'AboutController@index');

Auth::routes();

/*Route::get('/home', 'HomeController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts/store', 'PostController@store');
Route::get('/posts/edit/{id}', 'PostController@edit');
Route::post('/posts/update/{id}', 'PostController@update');
Route::delete('/posts/delete/{id}', 'PostController@delete');

Route::get('/orderlist', 'OrderController@index');*/



