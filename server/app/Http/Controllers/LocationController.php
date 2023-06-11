<?php

namespace App\Http\Controllers;

use App\Services\LocationService;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public $locationService;
    public $response;
    public function __construct(LocationService $location_service)
    {
        $this->locationService = $location_service;
        $this->response = ['success' => false, 'message' => 'No records found.'];
    }

    public function getWeatherForecastInfo(Request $request) {
        try {
            $result = $this->locationService->getWeatherForecastInfo($request);
            if (!empty($result)) {
                $this->response = ['success' => (bool) $result, 'data' => $result];
            }
        } catch (Exception $e) {
            $this->response = ['success' => false, 'message' => 'Someting went wrong.'];
        }

        return response()->json($this->response);
    }

    public function getPlaceDetails(Request $request)
    {
        try {
            $result = $this->locationService->getPlaceDetails($request);
            if (!empty($result['features'])) {
                $this->response = ['success' => (bool) $result['features'], 'data' => $result];
            }
        } catch (Exception $e) {
            $this->response = ['success' => false, 'message' => 'Someting went wrong.'];
        }
        return response()->json($this->response);
    }

    public function getPlaceId(Request $request)
    {
        try {
            $place_id = $this->locationService->getPlaceId($request);
            if (!empty($place_id)) {
                $this->response = ['success' => (bool) $place_id, 'id' => $place_id];
            }
        } catch (Exception $e) {
            $this->response = ['success' => false, 'message' => 'Someting went wrong.'];
        }
        return response()->json($this->response);
    }
}
