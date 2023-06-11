<?php

namespace App\Services;

use App\Repositories\LocationRepository;

class LocationService
{

    public $locationRepository;

    public function __construct(LocationRepository $location_repository)
    {
        $this->locationRepository = $location_repository;
    }

    public function getWeatherForecastInfo($request)
    {
        $city_name = (isset($request->city)) ? $request->city : "Osaka";
        return $this->locationRepository->getWeatherForecastInfo($city_name);
    }

    public function getPlaceDetails($request)
    {
        $place_id = (isset($request->id)) ? $request->id : null;
        return $this->locationRepository->getPlaceDetails($place_id);
    }

    public function getPlaceId($request) {
        $city_name = (isset($request->city)) ? $request->city : "Osaka";
        return $this->locationRepository->getPlaceId($city_name);
    }
}
