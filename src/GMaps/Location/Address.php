<?php

namespace GMaps\Location;

class Address
{
    private $value;

    /**
     * @param  string    $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
