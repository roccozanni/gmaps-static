<?php

// Register class loader
require_once('src/GMaps/ClassLoader.php');
GMaps\ClassLoader::register();

// Create a map
$map = new GMaps\StaticMap(new GMaps\Location(40.714728, -73.998672));
$map->setZoom(15);
$map->setWidth(640);
$map->setHeight(400);

// Build the url and the image tag
echo $map->getUrl() ."\n";
echo $map->getImageTag() ."\n";