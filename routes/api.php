<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api', 'middleware' => 'auth:api'], function() {
    Route::get('/alias/{publisher_id}', ['as' => 'api.alias.get', 'uses' => 'PublisherAliasController@get']);
    Route::post('/alias', ['as' => 'api.alias.store', 'uses' => 'PublisherAliasController@store']);
    Route::delete('/alias/{id}', ['as' => 'api.alias.delete', 'uses' => 'PublisherAliasController@delete']);

    Route::post('/publishers/logo', ['as' => 'publishers.logo.store', 'uses' => 'PublisherLogoController@store']);
    Route::post('/issues/logo', ['as' => 'issues.logo.store', 'uses' => 'IssueLogoController@store']);
    Route::post('/creators/logo', ['as' => 'creators.logo.store', 'uses' => 'CreatorLogoController@store']);
});
