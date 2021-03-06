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
Route::get('/applicationstatus/search', 'PagesController@getApplicationStatusSearchPage');
Route::get('/applicationstatus/search/result/', ['as' => 'applicationstatus.searchresult', 'uses' => 'PagesController@getApplicationStatus']);


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
// License PDF export
Route::get('license/pdf/{id}', 'ApplicationController@getPDF');  

// Admin Controller
Route::resource('admin', 'AdminController');

// Roles Controller
Route::resource('roles', 'RoleController');

// Inspection Controller
//Route::resource('inspections', 'InspectionController');
// EDIT/ UPDATE (INSPECTAGAIN)
Route::get('inspections/{id}/edit', ['as' => 'inspections.edit', 'uses' => 'InspectionController@edit']);
Route::patch('inspections/{id}', ['as' => 'inspections.update', 'uses' => 'InspectionController@update']);


// PENDING
Route::get('inspections/', ['as' => 'inspections.index', 'uses' => 'InspectionController@index']);
Route::get('inspections/pending', ['as' => 'inspections.pending', 'uses' => 'InspectionController@getPending']);
// INSPECTED
Route::get('inspections/inspected', ['as' => 'inspections.inspected', 'uses' => 'InspectionController@getInspected']);
// APPROVED 
Route::get('inspections/approved', ['as' => 'inspections.approved', 'uses' => 'InspectionController@getApproved']);
// REJECTED 
Route::get('inspections/rejected', ['as' => 'inspections.rejected', 'uses' => 'InspectionController@getRejected']);
// EXPIRED 
Route::get('inspections/expired', ['as' => 'inspections.expired', 'uses' => 'InspectionController@getExpired']);

// Inspect  Phase 1
Route::get('inspections/inspect/phase/1/{id}', ['as' => 'inspections.inspect', 'uses' => 'InspectionController@getInspect']);
Route::post('inspections/inspect/phase/1', ['as' => 'inspections.notify', 'uses' => 'InspectionController@postInspect']);

// Inspect  Phase 2
Route::get('inspections/inspect/phase/2/{id}', ['as' => 'inspections.getPhase2', 'uses' => 'InspectionController@getPhase2']);
Route::post('inspections/inspect/phase/2/{id}', ['as' => 'inspections.postPhase2', 'uses' => 'InspectionController@postPhase2']);


// Approve 
Route::get('inspections/approve/{id}', ['as' => 'inspections.approve', 'uses' => 'InspectionController@getApprove']);
Route::post('inspections/approve/{id}', ['as' => 'inspections.approvepost', 'uses' => 'InspectionController@postApprove']);

// Reject
Route::get('inspections/reject/{id}', ['as' => 'inspections.reject', 'uses' => 'InspectionController@getReject']);
Route::post('inspections/reject/{id}', ['as' => 'inspections.rejectpost', 'uses' => 'InspectionController@postReject']);

// Response
Route::get('inspections/inspect/response/{id}', ['as' => 'inspections.response', 'uses' => 'InspectionController@getResponse']);

// Report Generation Controller
Route::get('/reports', 'ReportController@getIndex');
// Export file as excel (.xlxs) format
Route::get('/reports/export/pending/excel', 'ReportController@getExcelPending');
Route::get('/reports/export/inspected/excel', 'ReportController@getExcelInspected');
Route::get('/reports/export/approved/excel', 'ReportController@getExcelApproved');
Route::get('/reports/export/rejected/excel', 'ReportController@getExcelRejected');
Route::get('/reports/export/expired/excel', 'ReportController@getExcelExpired');
// Export file as PDF (.pdf) format
Route::get('/reports/export/pending/pdf', 'ReportController@getPDFPending');
Route::get('/reports/export/inspected/pdf', 'ReportController@getPDFInspected');
Route::get('/reports/export/approved/pdf', 'ReportController@getPDFApproved');
Route::get('/reports/export/rejected/pdf', 'ReportController@getPDFRejected');
Route::get('/reports/export/expired/pdf', 'ReportController@getPDFExpired');

// Fire Emergency App
Route::get('/reports/androidapp', ['as' => 'reports.androidapp', 'uses' => 'ReportController@getAndroidApp']);
Route::post('reports/new/firestation', 'ReportController@postNewFireStation');
// Export file as excel (.xlxs) format-Fire Emergency
Route::get('/reports/export/androidapp/messages', 'ReportController@getExcelAppMessages');

