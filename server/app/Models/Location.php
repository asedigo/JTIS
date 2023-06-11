<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Location extends Model
{
    use HasFactory;

    private $weather_key;
    public function __construct()
    {
        $this->weather_key = config('generic_config.weather_app_api_key');
        $this->geo_key = config('generic_config.geoapify_api_key');
    }
    public function getWeatherForecastInfo($city_name) {
        $response = [];
        $weather_api_key = config('generic_config.weather_app_api_key');
        $result = Http::get('https://api.openweathermap.org/data/2.5/forecast?q='.$city_name.'&appid='.$weather_api_key)->json();

        if (!empty($result['list'])) {
            $response = $result;
        }
        return $response;
    }

    public function getPlaceDetails($place_id) {
        $response = [];
        $geopify_api_key = config('generic_config.geoapify_api_key');
        if (!empty($place_id)) {
            $response = Http::get('https://api.geoapify.com/v2/places?categories=activity,accommodation,commercial,catering.restaurant,entertainment&filter=place:'.$place_id.'&lang=en&limit=10&apiKey='.$this->geo_key)->json();
        }
        return $response;
    }

    public function getPlaceId($city_name) {
        $place_id = null;
        $place_data = Http::get('https://api.geoapify.com/v1/geocode/search?text='.$city_name.'&lang=en&limit=1&type=city&bias=countrycode:jp&apiKey='.$this->geo_key)->json();
        if (!empty($place_data['features'])) {
            $place_id = $place_data['features'][0]['properties']['place_id'];
        }
        return $place_id;
    }
}
