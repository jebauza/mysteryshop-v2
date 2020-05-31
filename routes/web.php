<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::redirect('/home', '/');

Route::get('/me', 'Auth\AuthController@getMeInformation')->name('auth.me');

Route::apiResources([
    'users' => 'UserController',
    'enterprises' => 'EnterpriseController',
    'clients' => 'ClientController',
    'establishment_types' => 'EstablishmentTypeController',
    'establishments' => 'EstablishmentController',
    'departments' => 'DepartmentController',
    'establishment_evaluations' => 'EstablishmentEvaluationController',
    'department_evaluations' => 'DepartmentEvaluationController'
]);




