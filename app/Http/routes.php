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

Route::post('/data/store', 'DataController@storeData');
Route::post('/data/edit', 'DataController@editData');
Route::post('/data/delete', 'DataController@deleteData');

Route::get('/api/local', 'DeviceController@local');
Route::get('/api/local/{local_id}/device', 'DeviceController@device');
Route::get('/api/device/{device_id}/info', 'DeviceController@info');
Route::get('/api/device/{device_id}/type/{type_id}/data', 'DeviceController@getData');
Route::get('/api/device/{device_id}/type/{type_id}/current', 'DeviceController@getCurrentData');
Route::get('/api/device/{device_id}/type/{type_id}/chart', 'DeviceController@chart');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Route::group(['middleware' => 'auth'], function() {
// 	Route::get('/', 'UserController@index');
// });

Route::get('/', function() {
	return view('welcome');
});