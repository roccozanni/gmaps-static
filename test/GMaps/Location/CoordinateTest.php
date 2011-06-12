<?php

namespace GMaps\Location;

class CoordinateTest extends \PHPUnit_Framework_TestCase
{
    public function testToString()
    {
        $c = new Coordinate(1.1, 2.2);
        $this->assertEquals("1.1,2.2", $c->__toString());
    }
}
