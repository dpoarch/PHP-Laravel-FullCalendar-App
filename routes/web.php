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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/create', 'HomeController@create')->name('create');

Route::post('/create', 'HomeController@save')->name('save');

Route::get('/update/{id}', 'HomeController@details')->name('details');

Route::post('/update', 'HomeController@update')->name('update');

Route::get('/delete/{id}', 'HomeController@delete')->name('create');

Route::get('/users', 'HomeController@users')->name('users');

Route::get('/profile/{id}', 'HomeController@profile')->name('profile');