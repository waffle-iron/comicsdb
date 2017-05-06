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

    Route::get('{id}/logo', ['as' => 'publishers.logo.add', 'uses' => 'PublisherLogoController@create'])->where(['id' => '[0-9]+']);
    Route::post('logo', ['as' => 'publishers.logo.store', 'uses' => 'PublisherLogoController@store']);
    Route::delete('logo', ['as' => 'publishers.logo.delete', 'uses' => 'PublisherLogoController@delete']);
});

Route::group(['prefix' => 'volumes', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'volumes.index', 'uses' => 'VolumeController@index']);
    Route::get('/publisher/{publisherId}', ['as' => 'volumes.index.byPublisher', 'uses' => 'VolumeController@index']);
    Route::get('{id}', ['as' => 'volumes.show', 'uses' => 'VolumeController@show'])->where(['id' => '[0-9]+']);
    Route::get('create/{publisher?}', ['as' => 'volumes.create', 'uses' => 'VolumeController@create']);
    Route::post('store', ['as' => 'volumes.store', 'uses' => 'VolumeController@store']);
    Route::get('{id}/edit', ['as' => 'volumes.edit', 'uses' => 'VolumeController@edit'])->where(['id' => '[0-9]+']);
    Route::post('update', ['as' => 'volumes.update', 'uses' => 'VolumeController@update']);
    Route::delete('/', ['as' => 'volumes.delete', 'uses' => 'VolumeController@delete']);
});

Route::group(['prefix' => 'issues', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'issues.index', 'uses' => 'IssueController@index']);
    Route::get('{id}', ['as' => 'issues.show', 'uses' => 'IssueController@show'])->where(['id' => '[0-9]+']);
    Route::get('create/{volume?}', ['as' => 'issues.create', 'uses' => 'IssueController@create'])->where(['volume' => '[0-9]+']);
    Route::post('store', ['as' => 'issues.store', 'uses' => 'IssueController@store']);
    Route::get('{id}/edit', ['as' => 'issues.edit', 'uses' => 'IssueController@edit'])->where(['id' => '[0-9]+']);
    Route::post('update', ['as' => 'issues.update', 'uses' => 'IssueController@update']);
    Route::delete('/', ['as' => 'issues.delete', 'uses' => 'IssueController@delete']);
});

Route::group(['prefix' => 'creators', 'middleware' => 'auth'], function() {
    Route::get('/', ['as' => 'creators.index', 'uses' => 'CreatorController@index']);
    Route::get('{id}', ['as' => 'creators.show', 'uses' => 'CreatorController@show'])->where(['id' => '[0-9]+']);
    Route::get('create', ['as' => 'creators.create', 'uses' => 'CreatorController@create']);
    Route::post('store', ['as' => 'creators.store', 'uses' => 'CreatorController@store']);
    Route::get('{id}/edit', ['as' => 'creators.edit', 'uses' => 'CreatorController@edit'])->where(['id' => '[0-9]+']);
    Route::post('update', ['as' => 'creators.update', 'uses' => 'CreatorController@update']);
    Route::delete('/', ['as' => 'creators.delete', 'uses' => 'CreatorController@delete']);
});
