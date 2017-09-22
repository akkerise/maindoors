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

Route::get('clgt', 'API2Controller@getAllUsers');
Route::get('clgt/{id}', 'API2Controller@getUserId');


//Route::group(['middleware' => 'cors', 'prefix' => '/v1'], function () {
//
//    Route::post('/login', 'UserController@authenticate');
//
//    Route::post('/register', 'UserController@register');
//
//    Route::get('/logout/{api_token}', 'UserController@logout');
//
//});

Route::post('auth/register', 'UserController@register');
Route::post('auth/login', 'UserController@login');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserController@getAuthUser');
    Route::post('user/{id}', 'UserController@updateUser');
    Route::get('user/{id}', 'UserController@getUserById');
});