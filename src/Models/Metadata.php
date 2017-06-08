<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class Metadata implements FromXML
{
    /** @var  string */
    protected $name;

    /** @var  string */
    protected $description;

    /** @var  Person */
    protected $author;

    /** @var  Copyright */
    protected $copyright;

    /** @var  Link[] */
    protected $links;

    /** @var  int */
    protected $time;

    /** @var  string */
    protected $keywords;

    /** @var  Bounds */
    protected $bounds;

    /** @var  Extensions */
    protected $extensions;

    /**
     * Metadata constructor.
     * @param string $name
     * @param string $description
     * @param Person $author
     * @param Copyright $copyright
     * @param Link[] $links
     * @param int $time
     * @param string $keywords
     * @param Bounds $bounds
     * @param Extensions $extensions
     */
    public function __construct($name = null, $description = null, Person $author = null, Copyright $copyright = null, array $links = array(), $time = null, $keywords = null, Bounds $bounds = null, Extensions $extensions = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->author = $author;
        $this->copyright = $copyright;
        $this->links = $links;
        $this->time = $time;
        $this->keywords = $keywords;
        $this->bounds = $bounds;
        $this->extensions = $extensions;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return Person
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param Person $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return Copyright
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @param Copyright $copyright
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
    }

    /**
     * @return Link[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param Link[] $links
     */
    public function setLinks($links)
    {
        $this->links = $links;
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
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return Bounds
     */
    public function getBounds()
    {
        return $this->bounds;
    }

    /**
     * @param Bounds $bounds
     */
    public function setBounds($bounds)
    {
        $this->bounds = $bounds;
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
     * @return Metadata
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        $metadata = new Metadata();

        if ( ! empty($xml->name)) {
            $metadata->setName((string) $xml->name[0]);
        }

        if ( ! empty($xml->desc)) {
            $metadata->setDescription((string) $xml->desc[0]);
        }

        if ( ! empty($xml->author)) {
            $metadata->setAuthor(Person::fromXML($xml->author[0]));
        }

        if ( ! empty($xml->copyright)) {
            $metadata->setCopyright(Copyright::fromXML($xml->copyright[0]));
        }

        if ( ! empty($xml->link)) {
            $links = [];

            foreach($xml->link as $link) {
                array_push($links, Link::fromXML($link));
            }

            $metadata->setLinks($links);
        }

        if ( ! empty($xml->time)) {
            $metadata->setTime(strtotime((string) $xml->time[0]));
        }

        if ( ! empty($xml->keywords)) {
            $metadata->setKeywords((string) $xml->keywords[0]);
        }

        if ( ! empty($xml->bounds)) {
            $metadata->setBounds(Bounds::fromXML($xml->bounds0[0]));
        }

        if ( ! empty($xml->extensions)) {
            $metadata->setExtensions(Extensions::fromXML($xml->extensions[0]));
        }

        return $metadata;
    }
}