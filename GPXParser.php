<?php

class GPXParser
{
    public function __construct()
    {

    }

    public function parseXML(SimpleXMLElement $xml) {
        $gpx = GPX::fromXML($xml);

        dd($gpx);
    }
}