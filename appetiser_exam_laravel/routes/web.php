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
    return redirect('nce-2018-passers');
});

Route::get('nce-2018-passers','PassersController@passers');
Route::post('nce-2018-passers/search','PassersController@searchPassers')->name('passers.search');
Route::get('nce-2018-passers-search/{search_val?}','PassersController@searchPasserss')->name('search.result');
Route::get('nce-2018-passers/school-ranking', 'PassersController@schoolRanking')->name('passers.school-ranking');
Route::post('nce-2018-passers/add','PassersController@addPasser')->name('passers.add');
