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

Route::get('{provider}/callback', 'Auth\SocialAuthController@callback')->name('auth.callback');
Route::get('{provider}/redirect', 'Auth\SocialAuthController@redirect')->name('auth.redirect');

Route::get('/home', 'HomeController@index')->name('home');
