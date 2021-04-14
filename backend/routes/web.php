<?php


use Illuminate\Support\Facades\Auth;
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

Route::namespace('User')->name('user.')->group(function () {
    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset' => true,
        'verify' => true,
        // パスワードリセット機能を使ってもらう
        'confirm' => false,
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // トップページ
        Route::resource('/', 'HomeController', ['only' => 'index']);
    });
});

// ログイン認証後
Route::middleware('auth:user')->group(function () {

    // トップページ
    Route::resource('/', 'HomeController', ['only' => 'index']);
});

Route::get('about', function() {
    return view('user.about');
})->name('about');

Route::get('/', 'HomeController@index')->name('home');
Route::resource('product', 'ProductController');
Route::resource('version', 'VersionController');
Route::resource('product_version', 'ProductVersionController');
Route::resource('vulnerability', 'VulnerabilityController');
Route::resource('comment', 'CommentController', ['only' => ['store', 'show', 'destroy']]);
Route::resource('user', 'UserController', ['only' => ['show', 'edit', 'update', 'destroy']]);
Route::resource('watch_list', 'WatchListController', ['only' => ['create', 'store', 'index', 'destroy']]);
