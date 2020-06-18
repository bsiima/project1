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

Route::get('/{names}/{name}', 'firstcontroller@getWelcomepage','names@getPersons' );
Route::get('/{name}', 'names@getPersons' );
Route::get('/{name}', 'school@getSchoolName' );
Route::get('/{name}', 'animals@getPetName' );
Route::get('/{name}', 'books@getNovel' );
Route::get('/{name}', 'city@getTown');