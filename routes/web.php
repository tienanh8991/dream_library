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

Route::middleware(['auth'])->group(function () {
    Route::prefix('/')->group(function () {
        Route::get('dashboard','UserController@index')->name('dashboard');
        Route::prefix('users')->group(function () {
            Route::get('/','UserController@getAll')->name('user.list');
            Route::get('create','UserController@create')->name('user.create');
            Route::post('store','UserController@store')->name('user.store');
            Route::get('{id}/destroy','UserController@destroy')->name('user.delete');
            Route::get('{id}/restore','UserController@restoreUser')->name('user.restore');
            Route::get('{id}/edit','UserController@editUser')->name('user.edit');
            Route::post('{id}/update','UserController@update')->name('user.update');
            Route::get('profile','UserController@getProfile')->name('user.profile');
            Route::post('/profile','UserController@editProfile')->name('update.profile');
        });
        Route::prefix('categories')->group(function (){
            Route::get('/','CategoryController@getAll')->name('category.list');
            Route::get('create','CategoryController@create')->name('category.create');
            Route::post('store','CategoryController@store')->name('category.store');
            Route::get('{id}/edit','CategoryController@edit')->name('category.edit');
            Route::post('{id}/update','CategoryController@update')->name('category.update');
            Route::get('{id}/destroy','CategoryController@destroy')->name('category.delete');
        });
        Route::prefix('books')->group(function (){
            Route::get('/','BookController@getAll')->name('book.list');
            Route::get('create','BookController@create')->name('book.create');
            Route::post('store','BookController@store')->name('book.store');
            Route::get('{id}/edit','BookController@edit')->name('book.edit');
            Route::post('{id}/update','BookController@update')->name('book.update');
            Route::get('{id}/destroy','BookController@destroy')->name('book.delete');
            Route::get('/search','BookController@search')->name('book.search');
            Route::get('/render','BookController@render')->name('book.render');
        });
        Route::prefix('customers')->group(function (){
            Route::get('/','CustomerController@getAll')->name('customer.list');
            Route::get('create','CustomerController@create')->name('customer.create');
            Route::post('store','CustomerController@store')->name('customer.store');
            Route::get('{id}/edit','CustomerController@edit')->name('customer.edit');
            Route::post('{id}/update','CustomerController@update')->name('customer.update');
            Route::post('{id}/destroy','CustomerController@destroy')->name('customer.delete');
            Route::get('/search','CustomerController@search')->name('customer.search');
            Route::get('/render','CustomerController@render')->name('customer.render');

        });
        Route::prefix('borrows')->group(function (){
            Route::get('/','BorrowController@getBorrow')->name('borrow.list');
            Route::get('create','BorrowController@create')->name('borrow.create');
            Route::post('/store','BorrowController@store')->name('borrow.store');
            Route::get('{id}/return','BorrowController@returnBook')->name('borrow.return');
            Route::get('return','BorrowController@showReturnBorrows')->name('borrow.return.list');
        });
        Route::prefix('libraries')->group(function () {
            Route::get('/','LibraryController@getAll')->name('library.list');
            Route::get('create','LibraryController@create')->name('library.create');
            Route::post('store','LibraryController@store')->name('library.store');
            Route::get('{id}/edit','LibraryController@edit')->name('library.edit');
            Route::post('{id}/update','LibraryController@update')->name('library.update');
            Route::get('{id}/destroy','LibraryController@destroy')->name('library.delete');
        });
    });

});


