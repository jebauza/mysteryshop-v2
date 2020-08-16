<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::redirect('/home', '/');
Route::get('/{optional?}', 'HomeController@index')->name('basepath');


Route::get('/me', 'Auth\AuthController@getMeInformation')->name('auth.me');





