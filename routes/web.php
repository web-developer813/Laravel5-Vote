<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//   // return view('welcome');
//});



Route::get('/',         ['as'=>'index', 'uses' =>'VoteController@index']);
Route::get('/state/{state}/{register?}',    ['as'=>'state', 'uses' =>'VoteController@state']);
Route::get('/states',    ['as'=>'states', 'uses' =>'VoteController@states']);
Route::get('non-us',    ['as'=>'non-us', 'uses' =>'VoteController@nonUs']);