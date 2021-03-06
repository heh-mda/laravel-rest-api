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

Route::group(['namespace' => 'API', 'middleware' => 'token'], function(){
    Route::get('/items', 'ItemController@index');
    Route::get('/items/{id}', 'ItemController@show');
    Route::post('/items', 'ItemController@store');
    Route::put('/items/{id}', 'ItemController@update');
    Route::delete('/items/{id}', 'ItemController@delete');
});

Route::post('/token', 'API\TokenController@store');

