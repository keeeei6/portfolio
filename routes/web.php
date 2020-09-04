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
    return view('auth/login');
});

Route::group(['prefix' => 'content', 'middleware' => 'auth'], function(){
    Route::get('/', 'ContentController@index')->name('content.index');
    Route::get('create', 'ContentController@create')->name('content.create');
    Route::post('store', 'ContentController@store')->name('content.store');
    Route::get('show/{id}', 'ContentController@show')->name('content.show');
    Route::get('edit/{id}', 'ContentController@edit')->name('content.edit');
    Route::post('update/{id}', 'ContentController@update')->name('content.update');
    Route::post('destroy/{id}', 'ContentController@destroy')->name('content.destroy');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
