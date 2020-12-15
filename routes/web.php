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


Route::get('/home', 'HomeController@index')->name('Dashboard');
Route::get('/logout','HomeController@logMeOut');

Route::get('/view-yields','YieldsController@getYields')->name('Yields');
Route::get('/add-yields-page','YieldsController@addYieldsPage')->name('Add Yields');
Route::get('/add-yield','YieldsController@validateYield');

Route::get('/add-crop','CropsController@validateCropsRequest');
Route::get('/add-crop-page','CropsController@addCropPage')->name('Add Crop Variety');
Route::get('/view-crops','CropsController@viewCrops')->name('All Crops');

Route::get('/add-equip','EquipmentsController@validateEquipment');
Route::get('/add-equipment','EquipmentsController@addEquipment')->name('Add Equipment');
Route::get('/view-farm-equipments','EquipmentsController@getEquipment')->name('Equipment View');


Route::get('/sensor-readings','SensorController@fetchSensorReadings')->name('Sensor Readings');

Route::get('/add-user','UserController@validateUserRequest');
Route::get('/add-user-page','UserController@addUserPage')->name('Add User');
Route::get('/view-users','UserController@viewUsers')->name('View All User');
Auth::routes();

