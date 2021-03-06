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

Route::get('/{city}', 'CityController@show');
Route::get('/', 'HomeController@index');
Route::get('/{city}/{company}', 'CompanyController@Show');
Route::get('/promos/{city}/{promotion}', 'PromotionController@Show');