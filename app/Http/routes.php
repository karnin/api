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
Route::get('api/{version_id}', 'Home\ApiController@index');
Route::get('apiGet/{api_id}', 'Home\ApiGetController@index');
Route::get('versionGet/{version_id}', 'Home\VersionGetController@index');
Route::get('dictionary', 'Home\DictionaryController@index');
Route::get('errorCode', 'Home\ErrorCodeController@index');

Route::group(['prefix'=>'admin'],function(){
    Route::get('', 'Admin\IndexController@index');
    Route::get('login', 'Admin\LoginController@index');
    Route::post('login', 'Admin\LoginController@doLogin');
    Route::get('logout', 'Admin\LoginController@logout');

    Route::get('project', 'Admin\ProjectController@index');
    Route::post('project', 'Admin\ProjectController@store');
    Route::get('project/{project_id}', 'Admin\ProjectController@edit');
    Route::put('project/{project_id}', 'Admin\ProjectController@update');
    Route::delete('project/{project_id}', 'Admin\ProjectController@delete');

    Route::get('version/{project_id}', 'Admin\VersionController@index');
    Route::post('version', 'Admin\VersionController@store');
    Route::post('version/copy', 'Admin\VersionController@copy');
    Route::get('version/{version_id}', 'Admin\VersionController@edit');
    Route::put('version/{version_id}', 'Admin\VersionController@update');
    Route::delete('version/{version_id}', 'Admin\VersionController@delete');

    Route::get('api/{version_id}', 'Admin\ApiController@index');
    Route::post('api', 'Admin\ApiController@store');
    Route::post('api/copy', 'Admin\ApiController@copy');
    Route::get('api/{api_id}', 'Admin\ApiController@edit');
    Route::put('api/{api_id}', 'Admin\ApiController@update');
    Route::delete('api/{api_id}', 'Admin\ApiController@delete');

    Route::get('dictionary', 'Admin\DictionaryController@index');
    Route::get('errorCode', 'Admin\ErrorCodeController@index');
    Route::post('errorCode', 'Admin\ErrorCodeController@store');
    Route::get('errorCode/{error_id}', 'Admin\ErrorCodeController@edit');
    Route::put('errorCode/{error_id}', 'Admin\ErrorCodeController@update');
    Route::delete('errorCode/{error_id}', 'Admin\ErrorCodeController@delete');
});
