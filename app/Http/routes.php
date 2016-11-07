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

Route::get('/', 'PagesController@getIndex');
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

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
//Route::resource('inspections', 'InspectionController');
// EDIT/ UPDATE (INSPECTAGAIN)
Route::get('inspections/{id}/edit', ['as' => 'inspections.edit', 'uses' => 'InspectionController@edit']);
Route::patch('inspections/{id}', ['as' => 'inspections.update', 'uses' => 'InspectionController@update']);


// PENDING/INSPECTED
Route::get('inspections/', ['as' => 'inspections.index', 'uses' => 'InspectionController@index']);
Route::get('inspections/pending', ['as' => 'inspections.pending', 'uses' => 'InspectionController@getPending']);
// APPROVED
Route::get('inspections/approved', ['as' => 'inspections.approved', 'uses' => 'InspectionController@getApproved']);
// Inspect
Route::get('inspections/inspect/{id}', ['as' => 'inspections.inspect', 'uses' => 'InspectionController@getInspect']);
Route::post('inspections/inspect', ['as' => 'inspections.notify', 'uses' => 'InspectionController@postInspect']);

// Approve 
Route::get('inspections/approve/{id}', ['as' => 'inspections.approve', 'uses' => 'InspectionController@getApprove']);
Route::post('inspections/approve/{id}', ['as' => 'inspections.approvepost', 'uses' => 'InspectionController@postApprove']);

// Reject
Route::get('inspections/reject/{id}', ['as' => 'inspections.reject', 'uses' => 'InspectionController@getReject']);

// Response
Route::get('inspections/inspect/response/{id}', ['as' => 'inspections.response', 'uses' => 'InspectionController@getResponse']);