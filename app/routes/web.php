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
// 新着一覧
Route::get('/restaurants/new', function () {
    return view('restaurant.new');
});

Route::post('/restaurants/new', 'RestaurantController@newRestaurants')->name('restaurant.new');

// 絞り込み検索
Route::group(['prefix' => 'filter'], function () {
    Route::get('/', function () {
        return view('search.filter');
    });
    Route::get('/search', 'SearchController@filter')->name('search.filter');
});

// 地図検索
Route::group(['prefix' => 'map'], function () {
    Route::get('/', function () {
        return view('search.map');
    });
    Route::get('/search', 'SearchController@map')->name('search.map');
});

// キーワードで検索
Route::group(['prefix' => 'word'], function () {
    Route::get('/', function () {
        return view('search.word');
    });
    Route::get('/search', 'SearchController@word')->name('search.word');
});

// 都道府県から探す
Route::get('/prefecture/search/{prefecture_id}', 'SearchController@filterByPrefecture')->name('search.prefecture');
// カテゴリIDから探す
Route::get('/category/search/{category_id}', 'SearchController@filterByCategory')->name('search.category');

// お問い合わせ
Route::group(['prefix' => 'contact'], function () {
    //入力ページ
    Route::get('/', 'ContactController@index')->name('contact.index');
    //確認ページ
    Route::post('/confirm', 'ContactController@confirm')->name('contact.confirm');
    //送信完了ページ
    Route::post('/thanks', 'ContactController@thanks')->name('contact.thanks');
});

// twitter ログイン
Route::get('login/twitter', 'Auth\TwitterLoginController@redirectToProvider')->name('login.twitter');
Route::get('auth/twitter/callback', 'Auth\TwitterLoginController@handleProviderCallback');
Route::get('auth/twitter/logout', 'Auth\TwitterController@logout');

Route::group(['middleware' => 'auth'], function () {

    // いいね
    Route::post('favorites', 'FavoriteController@store');
    Route::delete('favorites/{favorite_id}', 'FavoriteController@destroy');

    // ワンコインランチの店舗について
    Route::group(['prefix' => 'restaurant'], function () {
        // 新規作成画面
        Route::get('/create', 'RestaurantController@create')->name('restaurant.create');
        // 確認確認
        Route::post('/confirm', 'RestaurantController@confirm')->name('restaurant.confirm');
        // 登録
        Route::post('/store', 'RestaurantController@store')->name('restaurant.store');
        // 編集画面
        Route::get('/edit/{restaurant_id}', 'RestaurantController@edit')->name('restaurant.edit');
        // 更新
        Route::put('/update/{restaurant_id}', 'RestaurantController@update')->name('restaurant.update');
        // 詳細
        Route::get('/show/{restaurant_id}', 'RestaurantController@show')->name('restaurant.show');
        // お気に入りしている店舗
        Route::get('/favoriteList', 'RestaurantController@favoriteList')->name('restaurant.favoriteList');
    });

    // プロフィールについて
    Route::group(['prefix' => 'user'], function () {
        // 編集画面
        Route::get('/edit/myProfile', 'UserController@editMyProfile')->name('user.editMyProfile');
        // プロフィール更新
        Route::put('/update', 'UserController@updateProfile')->name('user.updateProfile');
        // 詳細
        Route::get('/profile/{user_id}', 'UserController@profile')->name('user.profile');
        Route::get('/myProfile', 'UserController@myProfile')->name('user.myProfile');
    });

    Route::get('/home', 'HomeController@index')->name('home');

});