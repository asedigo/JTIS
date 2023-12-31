<?php

use App\Http\Controllers\LocationController;
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

Route::post('weather_forecast', [LocationController::class, 'getWeatherForecastInfo']);
Route::post('place_details', [LocationController::class, 'getPlaceDetails']);
