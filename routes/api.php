<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:api'])->group(function () {
    Route::get('/countries/{country}/cities', [\App\Http\Controllers\CountryController::class, 'cities']);
    Route::resource('countries', \App\Http\Controllers\CountryController::class)->middleware('auth:api');
    Route::resource('cities', \App\Http\Controllers\CityController::class);
    Route::resource('areas', \App\Http\Controllers\AreaController::class);
});


