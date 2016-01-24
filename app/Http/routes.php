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
    return view('welcome');
});

Route::post('/data/store', 'DataController@storeData');

Route::get('/api/local', 'DeviceController@local');
Route::get('/api/local/{local_id}/device', 'DeviceController@device');
Route::get('/api/device/{device_id}/info', 'DeviceController@info');
Route::get('/api/device/{device_id}/type/{type_id}/data', 'DeviceController@getData');