<?php

namespace GMaps;

class Marker
{
    private $size;
    private $color;
    private $location;

    private static $ALLOWED_SIZES = array(
        'tiny', 'mid', 'small', 'normal');
    private static $ALLOWED_COLORS = array(
        'black', 'brown', 'green', 'purple', 'yellow', 'blue', 'gray', 'orange', 'red', 'white');

    public function __construct($location)
    {
        $this->location = $location;
        $this->color    = 'red';
        $this->size     = 'normal';
    }

    public function setSize($size)
    {
        if (!in_array($size, self::$ALLOWED_SIZES)) {
            return;
        }

        $this->size = $size;
    }

    public function setColor($color)
    {
        if (!in_array($color, self::$ALLOWED_COLORS)) {
            return;
        }

        $this->color = $color;
    }

    public function __toString()
    {
        return "size:" . $this->size . "|" .
               "color:" . $this->color . "|" .
               $this->location->getLongitude() . "," . $this->location->getLatitude();
    }
}
