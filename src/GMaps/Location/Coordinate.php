<?php

namespace GMaps\Location;

class Coordinate
{
    private $longitude;
    private $latitude;

    /**
     * @param  float    $longitude
     * @param  float    $latitude
     */
    public function __construct($longitude, $latitude)
    {
        $this->longitude = $longitude;
        $this->latitude  = $latitude;
    }

    public function __toString()
    {
        return $this->longitude . "," . $this->latitude;
    }
}
