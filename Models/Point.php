<?php

class Point implements FromXML
{
    /** @var  float */
    protected $latitude;

    /** @var  float */
    protected $longitude;

    /** @var  float */
    protected $elevation;

    /** @var  int */
    protected $time;

    /**
     * Point constructor.
     * @param float $latitude
     * @param float $longitude
     * @param float $elevation
     * @param int $time
     */
    public function __construct($latitude, $longitude, $elevation = null, $time = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->elevation = $elevation;
        $this->time = $time;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    /**
     * @param float $elevation
     */
    public function setElevation($elevation)
    {
        $this->elevation = $elevation;
    }

    /**
     * @return int
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param int $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @param SimpleXMLElement $xml
     * @return Point
     * @throws InvalidGPXException
     */
    public static function fromXML(SimpleXMLElement $xml)
    {
        $attributes = $xml->attributes();

        if ( ! $latitude = $attributes['lat']) {
            throw new InvalidGPXException("No latitude specified on point node.");
        }

        if ( ! $longitude = $attributes['lon']) {
            throw new InvalidGPXException("No longitude specified on point node.");
        }

        $point = new Point((float) $latitude, (float) $longitude);

        if ( ! empty($xml->ele)) {
            $point->setElevation((float) $xml->ele[0]);
        }

        if ( ! empty($xml->time)) {
            $point->setTime(strtotime((string) $xml->time[0]));
        }

        return $point;
    }
}