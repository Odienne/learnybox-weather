<?php

namespace PhpTest\Services;

use PhpTest\DTO\CityDTO;

/**
 * Class WeatherService
 *
 * Open Weather Api doc : https://openweathermap.org/api
 *
 * @package PhpTest
 */
class WeatherService
{
    /**
     * @var string
     */
    private string $apiKey;

    /**
     * @var string
     */
    private string $apiUrl;

    /**
     * @var GeocodingService
     */
    private GeocodingService $geocodingService;

    /**
     * WeatherService constructor.
     * @param string $apiKey
     * @param string $apiUrl
     */
    public function __construct(string $apiKey = OPENWEATHER_API_KEY, string $apiUrl = 'https://api.openweathermap.org/data/2.5/weather')
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
        $this->geocodingService = new GeocodingService();
    }

    public function getCityWeatherByName($name)
    {
        $cityDto = $this->geocodingService->getLocationFromName($name);

        return $this->getCityWeatherByCoordinates($cityDto->latitude, $cityDto->longitude);
    }

    public function getCityWeatherById($id)
    {
        $finalUrl = $this->apiUrl . "?id=$id&mode=html&appid=" . $this->apiKey;

        $ch = curl_init($finalUrl);

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ["error" => curl_error($ch), "message" => "An error occured"];
        }

        return $response;
    }

    public function getCityWeatherByCoordinates($lat, $lon)
    {
        $finalUrl = $this->apiUrl . "?lat=$lat&lon=$lon&mode=html&appid=" . $this->apiKey;

        $ch = curl_init($finalUrl);

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ["error" => curl_error($ch), "message" => "An error occured"];
        }

        return $response;
    }





}
