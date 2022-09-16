<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/countries/{country}/cities', [\App\Http\Controllers\CountryController::class, 'cities']);
Route::resource('countries', \App\Http\Controllers\CountryController::class);
Route::resource('cities', \App\Http\Controllers\CityController::class);
Route::resource('areas', \App\Http\Controllers\AreaController::class);
