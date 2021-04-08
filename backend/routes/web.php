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

// User
// Route::namespace('User')->prefix('user')->name('user.')->group(function () {
//     // ログイン認証関連
//     Auth::routes([
//         'register' => true,
//         'reset' => true,
//         'verify' => true,
//     ]);

//     // ログイン認証後
//     Route::middleware('auth:user')->group(function () {

//         // トップページ
//         Route::resource('/', 'HomeController', ['only' => 'index']);
//     });
// });

Route::namespace('User')->name('user.')->group(function () {
    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset' => true,
        'verify' => true,
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

// Route::get('/', function() {
//     return view('home');
//   });

Route::get('/', 'HomeController@index')->name('home');
Route::resource('product', 'ProductController');
Route::resource('version', 'VersionController');
Route::resource('product_version', 'ProductVersionController');
Route::resource('vulnerability', 'VulnerabilityController');
Route::resource('comment', 'CommentController', ['only' => ['store', 'show', 'destroy']]);
Route::resource('user', 'UserController', ['only' => ['show', 'edit', 'update', 'destroy']]);
