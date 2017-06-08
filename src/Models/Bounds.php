<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class Bounds implements FromXML
{
    /** @var  float */
    protected $minLatitude;

    /** @var  float */
    protected $minLongitude;

    /** @var  float */
    protected $maxLatitude;

    /** @var  float */
    protected $maxLongitude;

    /**
     * Bounds constructor.
     * @param float $minLatitude
     * @param float $minLongitude
     * @param float $maxLatitude
     * @param float $maxLongitude
     */
    public function __construct($minLatitude, $minLongitude, $maxLatitude, $maxLongitude)
    {
        $this->minLatitude = $minLatitude;
        $this->minLongitude = $minLongitude;
        $this->maxLatitude = $maxLatitude;
        $this->maxLongitude = $maxLongitude;
    }

    /**
     * @return float
     */
    public function getMinLatitude()
    {
        return $this->minLatitude;
    }

    /**
     * @param float $minLatitude
     */
    public function setMinLatitude($minLatitude)
    {
        $this->minLatitude = $minLatitude;
    }

    /**
     * @return float
     */
    public function getMinLongitude()
    {
        return $this->minLongitude;
    }

    /**
     * @param float $minLongitude
     */
    public function setMinLongitude($minLongitude)
    {
        $this->minLongitude = $minLongitude;
    }

    /**
     * @return float
     */
    public function getMaxLatitude()
    {
        return $this->maxLatitude;
    }

    /**
     * @param float $maxLatitude
     */
    public function setMaxLatitude($maxLatitude)
    {
        $this->maxLatitude = $maxLatitude;
    }

    /**
     * @return float
     */
    public function getMaxLongitude()
    {
        return $this->maxLongitude;
    }

    /**
     * @param float $maxLongitude
     */
    public function setMaxLongitude($maxLongitude)
    {
        $this->maxLongitude = $maxLongitude;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return Bounds
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        $attributes = $xml->attributes();

        if ( ! $minlat = $attributes['minlat']) {
            throw new InvalidGPXException("No minimum latitude specified on bounds node.");
        }

        if ( ! $minlon = $attributes['minlon']) {
            throw new InvalidGPXException("No minimum longitude specified on bounds node.");
        }

        if ( ! $maxlat = $attributes['maxlat']) {
            throw new InvalidGPXException("No maximum latitude specified on bounds node.");
        }

        if ( ! $maxlon = $attributes['maxlon']) {
            throw new InvalidGPXException("No maximum longitude specified on bounds node.");
        }

        $bounds = new Bounds((float) $minlat, (float) $minlon, (float) $maxlat, (float) $maxlon);

        return $bounds;
    }
}