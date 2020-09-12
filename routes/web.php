<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

//URL::forceScheme('https');

Auth::routes(['verify' => false, 'register' => false]);

Route::middleware(['auth'])->name('web.')->group(function () {

    Route::redirect('/home', '/');

    Route::get('/{optional?}', 'HomeController@index')->name('basepath');

    Route::get('/me', 'Auth\AuthController@getMeInformation')->name('auth.me');

    //Users
    /* Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', 'CMS\Dashboard\UserWebController@index')->name('index');
        Route::get('/export', 'CMS\Dashboard\UserWebController@export')->name('export');
    }); */
});





