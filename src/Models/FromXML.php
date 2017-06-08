<?php

namespace GPXParser\Models;

interface FromXML
{
    public static function fromXML(\SimpleXMLElement $xml);
}