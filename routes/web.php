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
// 商品詳細画面を表示
Route::get('show/{id}', 'ProductController@show')->name('show');
// 商品登録画面を表示
Route::get('create','ProductController@create')->name('create');
// 商品登録
Route::post('store','ProductController@store')->name('store');
