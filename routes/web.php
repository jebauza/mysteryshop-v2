<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::redirect('/home', '/');

Route::get('/me', 'Auth\AuthController@getMeInformation')->name('auth.me');





