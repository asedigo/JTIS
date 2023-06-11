<?php

interface Location {

    public function getWeatherForecastInfo(string $city_name = "");
    public function getPlaceDetails(string $city_name = "");
}