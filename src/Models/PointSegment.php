<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class PointSegment implements FromXML
{
    /** @var  Point[] */
    protected $points;

    /**
     * PointSegment constructor.
     * @param Point[] $points
     */
    public function __construct(array $points = array())
    {
        $this->points = $points;
    }

    /**
     * @return Point[]
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * @param Point[] $points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return PointSegment
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        $pointSegment = new PointSegment();

        if ( ! empty($xml->pt)) {
            $points = [];

            foreach ($xml->pt as $point) {
                array_push($points, Point::fromXML($point));
            }

            $pointSegment->setPoints($points);
        }

        return $pointSegment;
    }
}