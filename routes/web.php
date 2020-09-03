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
    return view('content/index');
});

Route::get('content/show', function () {
    return view('content/show');
});

Route::get('content/create', function () {
    return view('content/create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
