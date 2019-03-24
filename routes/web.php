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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['guest'])->group(function () {
    Route::get('{provider}/callback', 'Auth\SocialAuthController@callback')->name('auth.callback');
    Route::get('{provider}/redirect', 'Auth\SocialAuthController@redirect')->name('auth.redirect');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/tasks', 'TaskController@index')->name('task.list');
    Route::post('/tasks', 'TaskController@store')->name('task.store');
    Route::get('/tasks/{task}', 'TaskController@view')->name('task.view');
    Route::put('/tasks/{task}/change-status', 'TaskController@changeStatus')->name('task.move');
});