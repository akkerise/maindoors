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

Route::get('clgt', 'APIController@getAllUsers');
Route::get('clgt/{id}', 'APIController@getUserId');


Route::group(['middleware' => 'cors', 'prefix' => '/v1'], function () {

    Route::post('/login', 'UserController@authenticate');

    Route::post('/register', 'UserController@register');

    Route::get('/logout/{api_token}', 'UserController@logout');

});