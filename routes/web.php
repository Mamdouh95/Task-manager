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

Route::get('twitter/callback', 'Auth\SocialAuthController@twitterCallback')->name('twitter.auth.callback');
Route::get('twitter/redirect', 'Auth\SocialAuthController@twitterRedirect')->name('twitter.auth.redirect');

Route::get('facebook/callback', 'Auth\SocialAuthController@facebookCallback')->name('facebook.auth.callback');
Route::get('facebook/redirect', 'Auth\SocialAuthController@facebookRedirect')->name('facebook.auth.redirect');

Route::get('/home', 'HomeController@index')->name('home');
