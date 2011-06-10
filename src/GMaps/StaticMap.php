<?php

namespace GMaps;

class StaticMap
{
    private $width;
    private $height;
    private $zoom;
    private $center;

    /**
     * Creates a new map
     *
     * @param   GMaps\Location    $center The location to center the map to
     */
    public function __construct($center)
    {
        $this->center   = $center;
        $this->width    = 100;
        $this->height   = 100;
        $this->zoom     = 0;
    }

    /**
     * Set the map width
     *
     * @param   integer $width  The width in pixel ( 0-640 )
     */
    public function setWidth($width)
    {
        $this->width = max(0, min($width, 640));
    }

    /**
     * Set the map height
     * 
     * @param   integer $height  The height in pixel ( 0-640 )
     */
    public function setHeight($height)
    {
        $this->height = max(0, min($height, 640));
    }

    /**
     * Set the map zoom level
     * 
     * @param   integer $zoom  The zoom level ( 0-21 )
     */
    public function setZoom($zoom)
    {
        $this->zoom = max(0, min($zoom, 21));
    }

    /**
     * Builds the static map url
     *
     * @return string
     */
    public function getUrl()
    {
        $parameters = array(
            "sensor"    => "false",
            "size"      => $this->width . "x" . $this->height,
            "zoom"      => $this->zoom,
            "center"    => $this->center->getLongitude() . ',' . $this->center->getLatitude()
        );

        return "http://maps.google.com/maps/api/staticmap?" . http_build_query($parameters);
    }

    /**
     * Builds an image tag with the specified attributes
     * 
     * @param   array   $attributes The attributes to add to the html tag
     * @return  string
     */
    public function getImageTag($attributes)
    {
        $html = '<img ';

        $attributes = array_merge($attributes, array(
            'src'       => $this->getUrl(),
            'width'     => $this->width,
            'height'    => $this->height,
        ));

        foreach ($attributes as $name => $value) {
            $html .= $name . '=' .$value . ' ';
        }

        return $html . '/>';
    }
}