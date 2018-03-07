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


Route::post('login', 'AuthenticateController@login');

// workshop apis
// Route::middleware('jwt.auth')->get('workshops', 'WorkshopController@index');
// Route::middleware('jwt.auth')->post('new_workshop', 'WorkshopController@create');
// Route::middleware('jwt.auth')->post('edit_workshop', 'WorkshopController@create');

Route::group(['prefix' => 'staff'], function () {
	Route::ApiResource('workshop', 'WorkshopController');
});

Route::group(['prefix' => 'role'], function () {
	Route::ApiResource('sfr', 'SfrController');
});

