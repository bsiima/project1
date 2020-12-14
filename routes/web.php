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
Route::get('/view-yields','YieldsController@getYields')->name('Yields');
Route::get('/add-yields-page','YieldsController@addYieldsPage');
Route::get('/add-crop','CropsController@validateCropsRequest');
Route::get('/add-yield','YieldsController@validateYield');
Route::get('/logout','HomeController@logMeOut');
Auth::routes();

