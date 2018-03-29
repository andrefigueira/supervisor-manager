<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/setup', 'SetupController@index');

Route::get('/environments', 'EnvironmentsController@index');
Route::get('/environments/create', 'EnvironmentsController@create');
Route::get('/environments/{id}/edit', 'EnvironmentsController@edit');
Route::post('/environments/{id}/save', 'EnvironmentsController@save');
Route::post('/environments/store', 'EnvironmentsController@store');
Route::delete('/environments/{id}', 'EnvironmentsController@destroy');

Route::get('/servers', 'ServersController@index');
Route::get('/servers/create', 'ServersController@create');
Route::get('/servers/{id}/edit', 'ServersController@edit');
Route::post('/servers/{id}/save', 'ServersController@save');
Route::post('/servers/store', 'ServersController@store');
Route::delete('/servers/{id}', 'ServersController@destroy');

Route::get('/programs', 'ProgramsController@index');
Route::get('/programs/create', 'ProgramsController@create');
Route::get('/programs/{id}/edit', 'ProgramsController@edit');
Route::post('/programs/{id}/save', 'ProgramsController@save');
Route::post('/programs/store', 'ProgramsController@store');
Route::delete('/programs/{id}', 'ProgramsController@destroy');

Route::get('/settings', 'SettingsController@index');