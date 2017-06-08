<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class Link implements FromXML
{
    /** @var  string */
    protected $href;

    /** @var  string */
    protected $text;

    /** @var  string */
    protected $type;

    /**
     * Link constructor.
     * @param string $href
     * @param string $text
     * @param string $type
     */
    public function __construct($href, $text = null, $type = null)
    {
        $this->href = $href;
        $this->text = $text;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return Link
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        $attributes = $xml->attributes();

        if ( ! $href = $attributes['href']) {
            throw new InvalidGPXException("No href specified on link node.");
        }

        $link = new Link((string) $href);

        if ( ! empty($xml->text)) {
            $link->setText((string) $xml->text[0]);
        }

        if ( ! empty($xml->type)) {
            $link->setType((string) $xml->type[0]);
        }

        return $link;
    }
}