<?php

class Route implements FromXML
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

    /** @var  Waypoint[] */
    protected $routePoints;

    /**
     * Route constructor.
     * @param string $name
     * @param string $comment
     * @param string $description
     * @param string $source
     * @param Link[] $links
     * @param int $number
     * @param string $type
     * @param Extensions $extensions
     * @param Waypoint[] $routePoints
     */
    public function __construct($name = null, $comment = null, $description = null, $source = null, array $links = null, $number = null, $type = null, Extensions $extensions = null, array $routePoints = null)
    {
        $this->name = $name;
        $this->comment = $comment;
        $this->description = $description;
        $this->source = $source;
        $this->links = $links;
        $this->number = $number;
        $this->type = $type;
        $this->extensions = $extensions;
        $this->routePoints = $routePoints;
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
     * @return Waypoint[]
     */
    public function getRoutePoints()
    {
        return $this->routePoints;
    }

    /**
     * @param Waypoint[] $routePoints
     */
    public function setRoutePoints($routePoints)
    {
        $this->routePoints = $routePoints;
    }

    /**
     * @param SimpleXMLElement $xml
     * @return Route
     * @throws InvalidGPXException
     */
    public static function fromXML(SimpleXMLElement $xml)
    {
        $route = new Route();

        if ( ! empty($xml->name)) {
            $route->setName((string) $xml->name[0]);
        }

        if ( ! empty($xml->cmt)) {
            $route->setComment((string) $xml->cmt[0]);
        }

        if ( ! empty($xml->desc)) {
            $route->setDescription((string) $xml->desc[0]);
        }

        if ( ! empty($xml->src)) {
            $route->setSource((string) $xml->src[0]);
        }

        if ( ! empty($xml->link)) {
            $links = [];

            foreach($xml->link as $link) {
                array_push($links, Link::fromXML($link));
            }

            $route->setLinks($links);
        }

        if ( ! empty($xml->number)) {
            $route->setNumber((int) $xml->number[0]);
        }

        if ( ! empty($xml->type)) {
            $route->setType((string)$xml->type[0]);
        }

        if ( ! empty($xml->extensions)) {
            $route->setExtensions(Extensions::fromXML($xml->extensions[0]));
        }

        if ( ! empty($xml->rtept)) {
            $routePoints = [];

            foreach ($xml->rtept as $routePoint) {
                array_push($routePoints, Waypoint::fromXML($routePoint));
            }

            $route->setRoutePoints($routePoints);
        }

        return $route;
    }
}