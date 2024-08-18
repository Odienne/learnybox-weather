<?php

use PhpTest\Services\WeatherService;

if (!is_file(__DIR__ . '/../vendor/autoload.php')) {
    exit('/!\ Please run composer install /!\\');
}

require __DIR__ . '/../vendor/autoload.php';

$weatherService = new WeatherService();

$cityWeatherByIdHtml = $weatherService->getCityWeatherById(2172797);
echo $cityWeatherByIdHtml;

$cityWeatherByNameHtml = $weatherService->getCityWeatherByName("Toulouse");
echo $cityWeatherByNameHtml;

$cityWeatherByCoordinatesHtml = $weatherService->getCityWeatherByCoordinates(48.864716, 2.349014);
echo $cityWeatherByCoordinatesHtml;