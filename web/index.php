<?php

use PhpTest\Services\WeatherService;

if (!is_file(__DIR__ . '/../vendor/autoload.php')) {
    exit('/!\ Please run composer install /!\\');
}

require __DIR__ . '/../vendor/autoload.php';

// TODO: show weather
$weatherService = new WeatherService();
