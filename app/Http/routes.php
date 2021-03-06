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

Route::auth();
// Default routes
Route::get('/', 'HomeController@index');

// Labour routes
Route::get('/labour', ['as' => 'labour.dashboard', 'uses' => 'LabourController@index']);
Route::post('/labour/add', ['uses' => 'LabourController@add']);
Route::post('/labour/allocate', ['uses' => 'LabourController@allocateUser']);
Route::get('/labour/allocations', ['as' => 'labour.allocations', 'uses' => 'LabourController@allocations']);
Route::get('/labour/allocation/{id}', ['as' => 'labour.allocation', 'uses' => 'LabourController@timesheetView']);
Route::post('/labour/timesheet/new', ['as' => 'labour.timesheet.new', 'uses' => 'LabourController@timesheetNew']);
Route::get('/labour/timesheet/{id}', ['as' => 'labour.timesheet.del', 'uses' => 'LabourController@timesheetDel']);

Route::get('/allocation/{id}/{status}', ['as' => 'labour.changestatus', 'uses' => 'LabourController@changeStatus']);

// Builder auth routes
Route::get('/builder', ['as' => 'admin.dashboard', 'uses' => 'Auth\AdminLoginController@index']);
Route::get('/builder/login', ['as' => 'admin.login', 'uses' => 'Auth\AdminLoginController@loginForm']);
Route::post('/builder/login/submit', ['as' => 'admin.login.submit', 'uses' => 'Auth\AdminLoginController@login']);
Route::get('/builder/register', ['as' => 'admin.register', 'uses' => 'Auth\AdminLoginController@registerForm']);
Route::post('/builder/register/submit', ['as' => 'admin.register.submit', 'uses' => 'Auth\AdminLoginController@register']);

// Builder
Route::get('/builder/all', ['as' => 'admin.all', 'uses' => 'Auth\AdminLoginController@all']);
Route::get('/builder/update', 'Auth\AdminLoginController@updateUser');
Route::get('/builder/allocations', ['as' => 'admin.allocations', 'uses' => 'Auth\AdminLoginController@allocationsView']);
Route::get('/builder/jobs', ['as' => 'admin.jobs', 'uses' => 'Auth\AdminLoginController@jobsView']);

// Jobs
Route::get('/jobs', 'JobsController@index');
Route::get('/alljobs', 'JobsController@allJobs');
Route::get('/jobs/add', 'JobsController@add');
Route::post('/jobs/addjob', ['uses' => 'JobsController@addjob']);
Route::post('/job/{id}', ['uses' => 'JobsController@jobDel']);
Route::get('/job/{id}', ['uses' => 'JobsController@allocJobView']);
