<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->name('cmsapi.')->group(function () {

    //Users
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', 'CMS\Api\UserCmsApiController@index')->name('index');
        Route::put('/{user_id}/update', 'CMS\Api\UserCmsApiController@update')->name('update');
        Route::put('/{user_id}/update/last_sms', 'CMS\Api\UserCmsApiController@updateLastSMS')->name('update.last_sms');
    });

    //Burns
    Route::prefix('burns')->name('burns.')->group(function () {
        Route::get('/', 'CMS\Api\BurnCmsApiController@index')->name('index');
    });

    //Configuration
    Route::prefix('configuration')->name('configuration.')->group(function () {
        Route::get('/', 'CMS\Api\ConfigurationCmsApiController@index')->name('index');
        Route::put('/store', 'CMS\Api\ConfigurationCmsApiController@store')->name('store');
    });
});
