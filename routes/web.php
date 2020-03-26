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

Route::get('/', 'MainController@index');
Route::get('/ajax', 'AjaxController@index');
Route::get('message/{id}/edit', ['uses' => 'MainController@edit', 'as' => 'message.edit'])->where(['id' => '[0-9]+']);

