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

Route::get('home', ['as' => 'dashboard.index', 'uses' => 'HomeController@index']);
Route::get('dashboard', ['as' => 'dashboard.index', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'publishers', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'publishers.index', 'uses' => 'PublisherController@index']);
    Route::get('{id}', ['as' => 'publishers.show', 'uses' => 'PublisherController@show'])->where(['id' => '[0-9]+']);
    Route::get('create', ['as' => 'publishers.create', 'uses' => 'PublisherController@create']);
    Route::post('store', ['as' => 'publishers.store', 'uses' => 'PublisherController@store']);
    Route::get('{id}/edit', ['as' => 'publishers.edit', 'uses' => 'PublisherController@edit'])->where(['id' => '[0-9]+']);
    Route::post('update', ['as' => 'publishers.update', 'uses' => 'PublisherController@update']);
    Route::delete('/', ['as' => 'publishers.delete', 'uses' => 'PublisherController@delete']);

    Route::get('{id}/logo', ['as' => 'publishers.logo.add', 'uses' => 'LogoController@create'])->where(['id' => '[0-9]+']);
    Route::post('logo', ['as' => 'publishers.logo.store', 'uses' => 'LogoController@store']);
    Route::delete('logo', ['as' => 'publishers.logo.delete', 'uses' => 'LogoController@delete']);
});

Route::group(['prefix' => 'volumes', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'volumes.index', 'uses' => 'VolumeController@index']);
    Route::get('{id}', ['as' => 'volumes.show', 'uses' => 'VolumeController@show'])->where(['id' => '[0-9]+']);
    Route::get('create', ['as' => 'volumes.create', 'uses' => 'VolumeController@create']);
    Route::post('store', ['as' => 'volumes.store', 'uses' => 'VolumeController@store']);
    Route::get('{id}/edit', ['as' => 'volumes.edit', 'uses' => 'VolumeController@edit'])->where(['id' => '[0-9]+']);
    Route::post('update', ['as' => 'volumes.update', 'uses' => 'VolumeController@update']);
    Route::delete('/', ['as' => 'volumes.delete', 'uses' => 'VolumeController@delete']);
});
