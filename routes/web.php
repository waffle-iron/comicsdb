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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'publishers'], function() {
    Route::get('/', ['as' => 'publishers.index', 'uses' => 'PublisherController@index']);
    Route::get('create', ['as' => 'publishers.create', 'uses' => 'PublisherController@create']);
    Route::post('store', ['as' => 'publishers.store', 'uses' => 'PublisherController@store']);
});
