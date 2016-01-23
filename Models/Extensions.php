<?php

class Extensions implements FromXML
{
    public function __construct() {

    }

    /**
     * @param SimpleXMLElement $xml
     * @return Extensions
     */
    public static function fromXML(SimpleXMLElement $xml)
    {
        return new Extensions();
    }
}