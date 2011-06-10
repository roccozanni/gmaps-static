<?php

// Register class loader
require_once('src/GMaps/ClassLoader.php');
GMaps\ClassLoader::register();

// Create a map
$map = new GMaps\StaticMap(new GMaps\Location(40.714728, -73.998672));
$map->setType('hybrid');
$map->setZoom(15);
$map->setWidth(640);
$map->setHeight(400);

// Add a marker with default settings
$marker1 = new GMaps\Marker(new GMaps\Location(40.714728, -73.998672));
$map->addMarker($marker1);

// Add a marker with different color and size
$marker2 = new GMaps\Marker(new GMaps\Location(40.715728, -73.997672));
$marker2->setColor('blue');
$marker2->setSize('mid');
$map->addMarker($marker2);

// Add a marker with different color and size
$marker3 = new GMaps\Marker(new GMaps\Location(40.712728, -73.999672));
$marker3->setColor('yellow');
$marker3->setSize('small');
$map->addMarker($marker3);

// Build the url and the image tag
echo $map->getUrl() ."\n";
echo $map->getImageTag() ."\n";