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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// User
Route::namespace('User')->prefix('user')->name('user.')->group(function () {
    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset' => true,
        'verify' => true,
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // トップページ
        Route::resource('home', 'HomeController', ['only' => 'index']);
    });
});

Route::resource('product', 'ProductController');
Route::resource('version', 'VersionController');
Route::resource('product_version', 'ProductVersionController');
Route::resource('vulnerability', 'VulnerabilityController');
Route::resource('comment', 'CommentController');


// Administrator
// Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
//     // ログイン認証関連
//     Auth::routes([
//         'register' => true,
//         'reset' => false,
//         'verify' => false,
//     ]);

//     // ログイン認証後
//     Route::middleware('auth:admin')->group(function () {

//         // トップページ
//         Route::resource('home', 'HomeController', ['only' => 'index']);
//     });
// });