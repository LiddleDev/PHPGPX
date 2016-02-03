<?php

class Track implements FromXML
{
    /** @var  string */
    protected $name;

    /** @var  string */
    protected $comment;

    /** @var  string */
    protected $description;

    /** @var  string */
    protected $source;

    /** @var  Link[] */
    protected $links;

    /** @var  int */
    protected $number;

    /** @var  string */
    protected $type;

    /** @var  Extensions */
    protected $extensions;

    /** @var  TrackSegment[] */
    protected $trackSegments;

    /**
     * Track constructor.
     * @param string $name
     * @param string $comment
     * @param string $description
     * @param string $source
     * @param Link[] $links
     * @param int $number
     * @param string $type
     * @param Extensions $extensions
     * @param TrackSegment[] $trackSegments
     */
    public function __construct($name = null, $comment = null, $description = null, $source = null, array $links = array(), $number = null, $type = null, Extensions $extensions = null, array $trackSegments = array())
    {
        $this->name = $name;
        $this->comment = $comment;
        $this->description = $description;
        $this->source = $source;
        $this->links = $links;
        $this->number = $number;
        $this->type = $type;
        $this->extensions = $extensions;
        $this->trackSegments = $trackSegments;
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
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
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
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
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
     * @return TrackSegment[]
     */
    public function getTrackSegments()
    {
        return $this->trackSegments;
    }

    /**
     * @param TrackSegment[] $trackSegments
     */
    public function setTrackSegments($trackSegments)
    {
        $this->trackSegments = $trackSegments;
    }

    /**
     * @param SimpleXMLElement $xml
     * @return Track
     */
    public static function fromXML(SimpleXMLElement $xml)
    {
        $track = new Track();

        if ( ! empty($xml->name)) {
            $track->setName((string) $xml->name[0]);
        }

        if ( ! empty($xml->cmt)) {
            $track->setComment((string) $xml->cmt[0]);
        }

        if ( ! empty($xml->desc)) {
            $track->setDescription((string) $xml->desc[0]);
        }

        if ( ! empty($xml->src)) {
            $track->setSource((string) $xml->src[0]);
        }

        if ( ! empty($xml->link)) {
            $links = [];

            foreach($xml->link as $link) {
                array_push($links, Link::fromXML($link));
            }

            $track->setLinks($links);
        }

        if ( ! empty($xml->number)) {
            $track->setNumber((int) $xml->number[0]);
        }

        if ( ! empty($xml->type)) {
            $track->setType((string)$xml->type[0]);
        }

        if ( ! empty($xml->extensions)) {
            $track->setExtensions(Extensions::fromXML($xml->extensions[0]));
        }

        if ( ! empty($xml->trkseg)) {
            $trackSegments = [];

            foreach ($xml->trkseg as $trackSegment) {
                array_push($trackSegments, TrackSegment::fromXML($trackSegment));
            }

            $track->setTrackSegments($trackSegments);
        }

        return $track;
    }
}