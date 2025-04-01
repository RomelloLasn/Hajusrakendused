<?php
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/weather', [WeatherController::class, 'index']);
Route::post('/weather/fetch', [WeatherController::class, 'fetchWeather']);
Route::get('/', function () {
    return view('welcome');
});
