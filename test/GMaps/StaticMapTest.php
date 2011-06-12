<?php

namespace GMaps;

class StaticMapTest extends \PHPUnit_Framework_TestCase
{
    public function testToStringWithCoordinateCenter()
    {
        $m = new StaticMap(new Location\Coordinate(1.1, 2.2));
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=0&center=1.1%2C2.2",
            $m->__toString());
    }

    public function testToStringWithAddressCenter()
    {
        $m = new StaticMap(new Location\Address("name"));
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=0&center=name",
            $m->__toString());
    }
    
    public function testToStringWithCustomZoom()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->setZoom(1);
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=1&center=name",
            $m->__toString());
    }

    public function testToStringWithNotSupportedZoom()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->setZoom(100);
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=21&center=name",
            $m->__toString());
    }

    public function testToStringWithCustomWidth()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->setWidth(300);
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=300x100&zoom=0&center=name",
            $m->__toString());
    }

    public function testToStringWithNotSupportedWidth()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->setWidth(1000);
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=640x100&zoom=0&center=name",
            $m->__toString());
    }

    public function testToStringWithCustomHeight()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->setHeight(300);
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x300&zoom=0&center=name",
            $m->__toString());
    }

    public function testToStringWithNotSupportedHeight()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->setHeight(1000);
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x640&zoom=0&center=name",
            $m->__toString());
    }

    public function testToStringWithCustomType()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->setType("satellite");
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=satellite&sensor=false&size=100x100&zoom=0&center=name",
            $m->__toString());
    }

    public function testToStringWithNotSupportedType()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->setType("roadmap");
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=0&center=name",
            $m->__toString());
    }

    public function testToStringWithOneMarker()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->addMarker(new Marker(new Location\Address("marker1")));
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=0&center=name&markers=size%3Anormal%7Ccolor%3Ared%7Cmarker1",
            $m->__toString());
    }

    public function testToStringWithTwoMarker()
    {
        $m = new StaticMap(new Location\Address("name"));
        $m->addMarker(new Marker(new Location\Address("marker1")));
        $m->addMarker(new Marker(new Location\Address("marker2")));
        $this->assertEquals(
            "http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=0&center=name&markers=size%3Anormal%7Ccolor%3Ared%7Cmarker1&markers=size%3Anormal%7Ccolor%3Ared%7Cmarker2",
            $m->__toString());
    }

    public function testGetImageTagWithNoAttributes()
    {
        $m = new StaticMap(new Location\Address("name"));
        $this->assertEquals(
            '<img src="http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=0&center=name" width="100" height="100" />',
            $m->getImageTag());
    }

    public function testGetImageTagWithAttributes()
    {
        $m = new StaticMap(new Location\Address("name"));
        $this->assertEquals(
            '<img class="foobar" src="http://maps.google.com/maps/api/staticmap?maptype=roadmap&sensor=false&size=100x100&zoom=0&center=name" width="100" height="100" />',
            $m->getImageTag(array("class" => "foobar")));
    }
}