<?php

namespace GMaps;

class MarkerTest extends \PHPUnit_Framework_TestCase
{
    public function testToStringWithCoordinateLocation()
    {
        $m = new Marker(new \GMaps\Location\Address("street name"));
        $this->assertEquals("size:normal|color:red|street name", $m->__toString());
    }

    public function testToStringWithAddressLocation()
    {
        $m = new Marker(new \GMaps\Location\Coordinate(1.1, 2.2));
        $this->assertEquals("size:normal|color:red|1.1,2.2", $m->__toString());
    }

    public function testToStringWithCustomSize()
    {
        $m = new Marker(new \GMaps\Location\Coordinate(1.1, 2.2));
        $m->setSize("tiny");
        $this->assertEquals("size:tiny|color:red|1.1,2.2", $m->__toString());
    }

    public function testToStringWithNotSupportedSize()
    {
        $m = new Marker(new \GMaps\Location\Coordinate(1.1, 2.2));
        $m->setSize("foobar");
        $this->assertEquals("size:normal|color:red|1.1,2.2", $m->__toString());
    }

    public function testToStringWithCustomColor()
    {
        $m = new Marker(new \GMaps\Location\Coordinate(1.1, 2.2));
        $m->setColor("blue");
        $this->assertEquals("size:normal|color:blue|1.1,2.2", $m->__toString());
    }

    public function testToStringWithNotSupportedColor()
    {
        $m = new Marker(new \GMaps\Location\Coordinate(1.1, 2.2));
        $m->setColor("foobar");
        $this->assertEquals("size:normal|color:red|1.1,2.2", $m->__toString());
    }
}
