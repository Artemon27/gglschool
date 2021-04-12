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


Auth::routes();

Route::get('/', 'GglController@index');
Route::get('/logout', 'Auth\LoginController@logout');

Route::post('/addRequest', 'GglController@addRequest');
/*Админка..........*/
Route::get('/admin', 'GglController@admin');

Route::get('/admin/schedules', 'GglController@fullschedules');
Route::post('/admin/addSchedule', 'GglController@addSchedule');
Route::post('/admin/editSchedule', 'GglController@editSchedule');
Route::post('/admin/delSchedule', 'GglController@delSchedule');

Route::get('/admin/persons', 'GglController@fullpersons');
Route::post('/admin/addPerson', 'GglController@addPerson');
Route::post('/admin/editPerson', 'GglController@editPerson');
Route::post('/admin/delPerson', 'GglController@delPerson');

Route::get('/admin/images', 'GglController@images');
Route::post('/admin/addImage', 'GglController@addImage');
Route::post('/admin/delImage', 'GglController@delImage');

Route::get('/admin/girls', 'GglController@girls');
Route::post('/admin/addGirls', 'GglController@addGirls');
Route::post('/admin/editGirls', 'GglController@editGirls');
Route::post('/admin/delGirls', 'GglController@delGirls');

Route::get('/admin/reply', 'GglController@reply');
Route::post('/admin/addReply', 'GglController@addReply');
Route::post('/admin/delReply', 'GglController@delReply');

Route::get('/admin/request', 'GglController@request');
Route::post('/admin/delRequest', 'GglController@delRequest');
/*..............Админка*/





