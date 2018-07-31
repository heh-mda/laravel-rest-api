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

Route::get('/items/{id}', 'API\ItemController@show');
Route::post('/items', 'API\ItemController@store');
Route::put('/items/{id}', 'API\ItemController@update');
Route::delete('/items/{id}', 'API\ItemController@delete');
