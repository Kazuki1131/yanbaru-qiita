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

//クエリ文字列をURLパラメーターで渡すため、GETメソッドを用いる
Route::get('/articles/search', 'ArticlesController@search')->name('articles.search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/articles/create', 'ArticlesController@create')->name('articles.create');

Route::post('/articles/create', 'ArticlesController@store')->name('articles.store');

Route::resource('articles', 'ArticlesController', ['only' => ['show']]);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('articles', 'ArticlesController', ['only' => ['edit', 'update', 'destroy']]);
    Route::resource('comments', 'CommentsController', ['only' => ['store', 'destroy']]);
    Route::get('/comments/create/{article}', 'CommentsController@create')->name('comments.create');
});
Route::get('user', 'UsersController@show')->name('user.show');

Route::post('/csv/export', 'CsvController@csvExport')->name('csv.export');
