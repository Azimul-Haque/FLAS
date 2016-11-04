<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.welcome');
});

// Authentication routes
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('/home', 'HomeController@index');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes
Route::get('auth/register', ['as' => 'register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Reset password
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// Application Controller
Route::resource('applications', 'ApplicationController');

// Admin Controller
Route::resource('admin', 'AdminController');

// Roles Controller
Route::resource('roles', 'RoleController');

// Inspection Controller
Route::resource('inspections', 'InspectionController');

Route::get('inspections/create/{id}', ['as' => 'inspections.create', 'uses' => 'InspectionController@create']);


Route::get('inspections/inspect/{id}', ['as' => 'inspections.inspect', 'uses' => 'InspectionController@getInspect']);
Route::post('inspections/inspect', ['as' => 'inspections.notify', 'uses' => 'InspectionController@postInspect']);
Route::get('inspections/inspect/response/{id}', ['as' => 'inspections.response', 'uses' => 'InspectionController@getResponse']);