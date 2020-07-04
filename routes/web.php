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

Route::get('/','Auth\LoginController@showFormLogin')->name('index');
Route::post('login','Auth\LoginController@login')->name('login');
Route::get('login','Auth\LoginController@logout')->name('logout');

Route::prefix('/')->group(function () {
    Route::get('dashboard','UserController@index')->name('dashboard');
    Route::prefix('user')->group(function () {
        Route::get('list','UserController@getAll')->name('user.list');
    });
});


