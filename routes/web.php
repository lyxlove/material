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
    return view('welcome');
});

Route::get('home/index', 'HomeController@index');

Route::post('home/gold', 'HomeController@gold');





Route::get('goods/index', 'GoodsController@index');
Route::get('goods/addtype/{pid}', 'GoodsController@addType');
Route::post('goods/savetype', 'GoodsController@saveType');
Route::post('goods/getlist', 'GoodsController@getList');
Route::post('goods/saveItem', 'GoodsController@saveItem');
Route::get('goods/addItem/{pid}', 'GoodsController@addItem');
