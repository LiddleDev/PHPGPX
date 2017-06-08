<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class GPX implements FromXML
{
    /** @var  float */
    protected $version;

    /** @var  string */
    protected $creator;

    /** @var  Metadata */
    protected $metadata;

    /** @var  Waypoint[] */
    protected $waypoints;

    /** @var  Route[] */
    protected $routes;

    /** @var  Track[] */
    protected $tracks;

    /** @var  Extensions */
    protected $extensions;

    /**
     * GPX constructor.
     * @param float $version
     * @param string $creator
     * @param Metadata $metadata
     * @param Waypoint[] $waypoints
     * @param Route[] $routes
     * @param Track[] $tracks
     * @param Extensions $extensions
     */
    public function __construct($version, $creator, Metadata $metadata = null, array $waypoints = array(), array $routes = array(), array $tracks = array(), Extensions $extensions = null)
    {
        $this->version = $version;
        $this->creator = $creator;
        $this->metadata = $metadata;
        $this->waypoints = $waypoints;
        $this->routes = $routes;
        $this->tracks = $tracks;
        $this->extensions = $extensions;
    }

    /**
     * @return float
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param float $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param string $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return Metadata
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param Metadata $metadata
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
    }

    /**
     * @return Waypoint[]
     */
    public function getWaypoints()
    {
        return $this->waypoints;
    }

    /**
     * @param Waypoint[] $waypoints
     */
    public function setWaypoints($waypoints)
    {
        $this->waypoints = $waypoints;
    }

    /**
     * @return Route[]
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param Route[] $routes
     */
    public function setRoutes($routes)
    {
        $this->routes = $routes;
    }

    /**
     * @return Track[]
     */
    public function getTracks()
    {
        return $this->tracks;
    }

    /**
     * @param Track[] $tracks
     */
    public function setTracks($tracks)
    {
        $this->tracks = $tracks;
    }

    /**
     * @return Extensions
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * @param Extensions $extensions
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return GPX
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        if ($xml->getName() != 'gpx') {
            throw new InvalidGPXException("Root node should be 'gpx'");
        }

        $attributes = $xml->attributes();

        $version = $attributes['version'];
        if ($version != 1.1) {
            throw new InvalidGPXException("Invalid GPX version. This library only supports GPX 1.1");
        }

        if ( ! $creator = $attributes['creator']) {
            throw new InvalidGPXException("No creator specified on GPX node.");
        }

        $gpx = new GPX((float) $version, (string) $creator);

        if ( ! empty($xml->metadata)) {
            $gpx->setMetadata(Metadata::fromXML($xml->metadata[0]));
        }

        if ( ! empty($xml->wpt)) {
            $waypoints = [];

            foreach($xml->wpt as $waypoint) {
                array_push($waypoints, Waypoint::fromXML($waypoint));
            }

            $gpx->setWaypoints($waypoints);
        }

        if ( ! empty($xml->rte)) {
            $routes = [];

            foreach($xml->rte as $route) {
                array_push($routes, Route::fromXML($route));
            }

            $gpx->setRoutes($routes);
        }

        if ( ! empty($xml->trk)) {
            $tracks = [];

            foreach($xml->trk as $track) {
                array_push($tracks, Track::fromXML($track));
            }

            $gpx->setTracks($tracks);
        }

        if ( ! empty($xml->extensions)) {
            $gpx->setExtensions(Extensions::fromXML($xml->extensions[0]));
        }

        return $gpx;
    }
}