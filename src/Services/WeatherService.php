<?php

namespace PhpTest\Services;

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
     * WeatherService constructor.
     * @param string $apiKey
     * @param string $apiUrl
     */
    public function __construct(string $apiKey = OPENWEATHER_API_KEY, string $apiUrl = 'https://api.openweathermap.org/data/2.5/')
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
    }

}
