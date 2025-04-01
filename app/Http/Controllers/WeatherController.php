<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        return view('weather');
    }

    public function fetchWeather(Request $request)
    {
        $city = $request->input('city');
        $cacheKey = "weather_{$city}";

        $weatherData = Cache::remember($cacheKey, 3600, function () use ($city) {
            $apiKey = env('WEATHER_API_KEY');
            $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $city,
                'appid' => $apiKey,
                'units' => 'metric',
            ]);

            if ($response->failed()) {
                abort(404, 'City not found');
            }

            return $response->json();
        });

        return response()->json($weatherData);
    }
}