<?php

// Register class loader
require_once('src/GMaps/ClassLoader.php');
GMaps\ClassLoader::register();

// Create a map with coordinates
$map1 = new GMaps\StaticMap(new GMaps\Location\Coordinate(40.714728, -73.998672));
$map1->setType('hybrid');
$map1->setZoom(15);
$map1->setWidth(640);
$map1->setHeight(400);

// Add a marker with default settings
$marker = new GMaps\Marker(new GMaps\Location\Coordinate(40.714728, -73.998672));
$map1->addMarker($marker);


// Create a map with an address
$map2 = new GMaps\StaticMap(new GMaps\Location\Address("Central park, New York"));
$map2->setZoom(15);
$map2->setWidth(640);
$map2->setHeight(400);

// Add a marker with different color and size
$marker = new GMaps\Marker(new GMaps\Location\Address("65th Street, New York"));
$marker->setColor('blue');
$marker->setSize('mid');
$map2->addMarker($marker);


// Build the url and the image tag
echo $map1->getUrl() ."\n";
echo $map1->getImageTag() ."\n";

echo $map2->getUrl() ."\n";
echo $map2->getImageTag() ."\n";