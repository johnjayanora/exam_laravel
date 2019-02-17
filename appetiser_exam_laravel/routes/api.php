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
Route::group(['middleware' => 'cors'], function() {
	Route::get('nce-2018-passers','PassersApiController@passers');
	Route::get('nce-2018-passers/search/{search_val}','PassersApiController@searchPassers');
	Route::get('nce-2018-passers/school-ranking', 'PassersApiController@schoolRanking');
	Route::post('nce-2018-passers/add','PassersApiController@addPasser');	
});
