<?php

namespace GMaps;

class StaticMap
{
    private $type;
    private $width;
    private $height;
    private $zoom;
    private $center;
    private $markers;

    private static $ALLOWED_TYPES = array(
        'roadmap', 'satellite', 'terrain', 'hybrid');

    /**
     * Creates a new map
     *
     * @param   GMaps\Location\Coordinate | GMaps\Location\Address   $center The location to center the map to
     */
    public function __construct($center)
    {
        $this->type     = 'roadmap';
        $this->center   = $center;
        $this->width    = 100;
        $this->height   = 100;
        $this->zoom     = 0;
        $this->markers  = array();
    }

    /**
     * Set the map type
     *
     * @param   string $type    The map type
     */
    public function setType($type)
    {
        if (!in_array($type, self::$ALLOWED_TYPES)) {
            return;
        }

        $this->type = $type;
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
     * Adds a marker to the map
     *
     * @param   GMaps\Marker    $marker The marker to add to the map
     */
    public function addMarker($marker)
    {
        $this->markers[] = $marker;
    }

    /**
     * Builds the static map url
     *
     * @return string
     */
    public function getUrl()
    {
        $parameters = array(
            "maptype"   => $this->type,
            "sensor"    => "false",
            "size"      => $this->width . "x" . $this->height,
            "zoom"      => $this->zoom,
            "center"    => $this->center->__toString()
        );

        $markers = array();
        foreach ($this->markers as $marker) {
            $markers[] = "markers=" . urlencode($marker->__toString());
        }
        $markers = implode('&', $markers);

        $url = "http://maps.google.com/maps/api/staticmap?" . http_build_query($parameters);

        if (count($markers) > 0) {
            $url .= "&" . $markers;
        }
        return $url;
    }

    /**
     * Builds an image tag with the specified attributes
     * 
     * @param   array   $attributes The attributes to add to the html tag
     * @return  string
     */
    public function getImageTag($attributes = array())
    {
        $html = '<img ';

        $attributes = array_merge($attributes, array(
            'src'       => $this->getUrl(),
            'width'     => $this->width,
            'height'    => $this->height,
        ));

        foreach ($attributes as $name => $value) {
            $html .= $name . '="' .$value . '" ';
        }

        return $html . '/>';
    }
}