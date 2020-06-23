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

/**
 * フロントサイド
 */
Route::namespace('Front')->name('front.')->group(function () {
    Auth::routes([
        'register' => true,
        'reset' => false,
        'verify' => false,
    ]);

    Route::get('/home', 'HomeController@index')->name('home');
});

/**
 * 管理サイド
 */
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Auth::routes([
        'register' => false,
        'reset' => false,
        'verify' => false,
    ]);
    Route::middleware('auth:admin')->group(function () {
        Route::get('home', 'HomeController@index')->name('home');
    });
});

/**
 * リダイレクト
 */
Route::redirect('/', '/home');
Route::redirect('/admin', '/admin/home');
