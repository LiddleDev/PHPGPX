<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class TrackSegment implements FromXML
{
    /** @var  Waypoint[] */
    protected $trackPoints;

    /** @var  Extensions */
    protected $extensions;

    /**
     * TrackSegment constructor.
     * @param Waypoint[] $trackPoints
     * @param Extensions $extensions
     */
    public function __construct(array $trackPoints = array(), Extensions $extensions = null)
    {
        $this->trackPoints = $trackPoints;
        $this->extensions = $extensions;
    }

    /**
     * @return Waypoint[]
     */
    public function getTrackPoints()
    {
        return $this->trackPoints;
    }

    /**
     * @param Waypoint[] $trackPoints
     */
    public function setTrackPoints($trackPoints)
    {
        $this->trackPoints = $trackPoints;
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
     * @return TrackSegment
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        $trackSegment = new TrackSegment();

        if ( ! empty($xml->trkpt)) {
            $trackPoints = [];

            foreach ($xml->trkpt as $trackPoint) {
                array_push($trackPoints, Waypoint::fromXML($trackPoint));
            }

            $trackSegment->setTrackPoints($trackPoints);
        }

        if ( ! empty($xml->extensions)) {
            $trackSegment->setExtensions(Extensions::fromXML($xml->extensions[0]));
        }

        return $trackSegment;
    }
}