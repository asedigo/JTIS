<?php

namespace App\Repositories;

use App\Models\Location as LocationModel;
use Location;

class LocationRepository implements Location
{

    private $location;
    public function __construct(LocationModel $location_model)
    {
        $this->location = $location_model;
    }
    public function getWeatherForecastInfo(string $city_name = "")
    {
        return $this->location->getWeatherForecastInfo($city_name);
    }

    public function getPlaceDetails(string $place_id = null)
    {
        return $this->location->getPlaceDetails($place_id);
    }

    public function getPlaceId(string $city_name = "")
    {
        return $this->location->getPlaceId($city_name);
    }
}
