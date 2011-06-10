<?php

namespace GMaps;

class Location
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

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }
}
