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

Route::get('/', 'ArticlesController@index')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');

Route::resource('articles', 'ArticlesController', ['only' => ['show']]);

Route::get('user', 'UsersController@show');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('articles', 'ArticlesController', ['only' => ['edit', 'update']]);
});
