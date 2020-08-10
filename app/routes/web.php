<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

// topページ
Route::get('/', 'RestaurantController@index')->name('restaurant.index');

Route::get('login/twitter', 'Auth\TwitterLoginController@redirectToProvider')->name('login.twitter');
Route::get('auth/twitter/callback', 'Auth\TwitterLoginController@handleProviderCallback');
Route::get('auth/twitter/logout', 'Auth\TwitterController@logout');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'contact'], function () {
        //入力ページ
        Route::get('/', 'ContactController@index')->name('contact.index');
        //確認ページ
        Route::post('/confirm', 'ContactController@confirm')->name('contact.confirm');
        //送信完了ページ
        Route::post('/thanks', 'ContactController@send')->name('contact.send');
    });

    Route::group(['prefix' => 'restaurant'], function () {
        // 新規作成画面
        Route::get('/create', 'RestaurantController@create')->name('restaurant.create');
        // 確認確認
        Route::post('/confirm', 'RestaurantController@confirm')->name('restaurant.confirm');
        // 登録
        Route::post('/store', 'RestaurantController@store')->name('restaurant.store');
        // 編集画面
        Route::get('/edit/{restaurant_id}', 'RestaurantController@confirm')->name('restaurant.edit');
        // 更新
        Route::put('/update/{restaurant_id}', 'RestaurantController@update')->name('restaurant.update');
        // 詳細
        Route::get('/show/{restaurant_id}', 'RestaurantController@show')->name('restaurant.show');
    });

    Route::get('/home', 'HomeController@index')->name('home');

});