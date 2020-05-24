<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/blanck', function () {
    return view('blank');
});


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


