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
Route::resource('admin/games','GameController', ['middleware'=> ['auth']]);
Route::resource('admin/servers','ServerController', ['middleware'=> ['auth']]);
Route::resource('/','IndexСontroller');

Route::get('/start', 'StartController@index');

Route::get('/start/get-json', 'StartController@getJson');
Route::get('/start/get-jsongames', 'StartController@getJsonGames');
Route::get('/start/get-jsonserv', 'StartController@getJsonServ');
Route::get('/start/socket-chart', 'StartController@newEvent');
Route::get('/start/send-message', 'StartController@sendMessage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
