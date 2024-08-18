<?php

namespace PhpTest\Services;

use PhpTest\DTO\CityDTO;

/**
 * Class GeocodingService
 *
 * Geocoding API doc : https://openweathermap.org/api/geocoding-api
 *
 * @package PhpTest
 */
class GeocodingService
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
     * GeocodingService constructor.
     * @param string $apiKey
     * @param string $apiUrl
     */
    public function __construct(string $apiKey = OPENWEATHER_API_KEY, string $apiUrl = 'http://api.openweathermap.org/geo/1.0/direct')
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
    }

    public function getLocationFromName(string $name, int $limit = 1): CityDTO|array
    {
        $finalUrl = $this->apiUrl . "?q=$name&limit=$limit&appid=" . $this->apiKey;

        $ch = curl_init($finalUrl);

        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            return ["error" => curl_error($ch), "message" => "An error occured"];
        }

        $data = json_decode($response, true);

        return new CityDTO($name, $data[0]["lat"], $data[0]["lon"]);

    }


}