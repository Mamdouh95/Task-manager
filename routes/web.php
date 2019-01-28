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

Route::get('twitter/callback', 'Auth\SocialAuthController@callback')->name('twitter.auth.callback');
Route::get('twitter/redirect', 'Auth\SocialAuthController@redirect')->name('twitter.auth.redirect');

Route::get('/home', 'HomeController@index')->name('home');
