<?php

use PhpTest\Services\WeatherService;

if (!is_file(__DIR__ . '/../vendor/autoload.php')) {
    exit('/!\ Please run composer install /!\\');
}

require __DIR__ . '/../vendor/autoload.php';

$weatherService = new WeatherService();

$cityWeatherHtml = $weatherService->getCityWeatherById(2172797);
echo $cityWeatherHtml;

$cityWeatherHtml = $weatherService->getCityWeatherByName("Toulouse");
echo $cityWeatherHtml;

$cityWeatherHtml = $weatherService->getCityWeatherByCoordinates(11, -55);
echo $cityWeatherHtml;