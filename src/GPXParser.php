<?php

namespace GPXParser;

use GPXParser\Models\GPX;

class GPXParser
{
    public function __construct()
    {

    }

    /**
     * @param \SimpleXMLElement $xml
     * @return GPX
     * @throws InvalidGPXException
     */
    public function parseXML(\SimpleXMLElement $xml) {
        $gpx = GPX::fromXML($xml);

        return $gpx;
    }
}