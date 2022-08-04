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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// 商品一覧画面を表示
Route::get('index', 'ProductController@index')->name('index');
// 商品一覧画面をjson表示する
Route::get('apiList', 'ProductController@apiList')->name('api_list');
// 商品詳細画面を表示
Route::get('show/{id}', 'ProductController@show')->name('show');
// 商品編集画面を表示
Route::get('edit/{id}', 'ProductController@edit')->name('edit');
// 商品編集(更新)
Route::post('update/{id}', 'ProductController@update')->name('update');
// 商品登録画面を表示
Route::get('create','ProductController@create')->name('create');
// 商品登録
Route::post('store','ProductController@store')->name('store');
// 商品削除
Route::post('destroy/{id}','ProductController@destroy')->name('destroy');