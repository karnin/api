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

Route::get('/', 'Home\IndexController@index');
Route::get('api', 'Home\ApiController@index');
Route::get('dictionary', 'Home\DictionaryController@index');
Route::get('errorCode', 'Home\ErrorCodeController@index');

