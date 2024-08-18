<?php

namespace PhpTest\DTO;

class CityDTO
{
    public string $name;
    public float $latitude;
    public float $longitude;

    public function __construct($name, $latitude, $longitude)
    {
        $this->name = $name;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}