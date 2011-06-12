<?php

namespace GMaps\Location;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    public function testToString()
    {
        $a = new Address("a street name");
        $this->assertEquals("a street name", $a->__toString());
    }
}
