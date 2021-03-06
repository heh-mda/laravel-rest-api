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
    return redirect('/items');
});

Route::resource('/items', 'ItemController')->except([
    'show'
]);
Route::get('/items/{id}/history', 'ItemController@showHistory')->name('items.history');