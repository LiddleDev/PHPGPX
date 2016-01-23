<?php

class Extensions implements FromXML
{
    protected $xml;

    public function __construct(SimpleXMLElement $xml = null) {
        $this->xml = $xml;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * @param SimpleXMLElement $xml
     */
    public function setXml($xml)
    {
        $this->xml = $xml;
    }

    /**
     * @param SimpleXMLElement $xml
     * @return Extensions
     */
    public static function fromXML(SimpleXMLElement $xml)
    {
        return new Extensions($xml);
    }
}