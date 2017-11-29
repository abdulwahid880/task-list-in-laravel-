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
Route::get('check','TaskController@store');
Route::get('/tasks',['uses'=>'TaskController@index',
	'as'=>'tasks.index',]);
Route::post('/task', [
	'uses'=>'TaskController@store',
	'as'=>'tasks.store',
	]);
Route::delete('/task/{task}',['uses'=>'TaskController@destroy',
	'as'=>'tasks.destroy',
	]);
Route::auth();
Route::get('/home', 'HomeController@index')->name('home');