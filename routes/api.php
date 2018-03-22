<?php

use Illuminate\Http\Request;


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');



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

Route::group(['prefix' => 'admin'], function () {
	Route::get('roles', 'RoleController@index');
	Route::post('roles', 'RoleController@update');
});

Route::group(['prefix' => 'reports'], function () {
	Route::ApiResource('sfr', 'SfrController');
	Route::get('faculty-qualification', 'FQController@index');
});

Route::get('stafflist', 'CustomController@staffList');
Route::ApiResource('academicyears', 'AcademicyearController');

