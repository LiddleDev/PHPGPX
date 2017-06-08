<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class Waypoint implements FromXML
{
    /** @var  float */
    protected $latitude;

    /** @var  float */
    protected $longitude;

    /** @var  float */
    protected $elevation;

    /** @var  int */
    protected $time;

    /** @var  float */
    protected $magvar;

    /** @var  float */
    protected $geoidheight;

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

    /** @var  string */
    protected $symbol;

    /** @var  string */
    protected $type;

    /** @var  string */
    protected $fix;

    /** @var  int */
    protected $satellites;

    /** @var  float */
    protected $hdop; // Horizontal dilution of precision.

    /** @var  float */
    protected $vdop; // Vertical dilution of precision.

    /** @var  float */
    protected $pdop; // Position dilution of precision.

    /** @var  float */
    protected $ageofdgpsdata; // Number of seconds since last DGPS update.

    /** @var  int */
    protected $dgpsid;

    /** @var  Extensions */
    protected $extensions;

    /**
     * Waypoint constructor.
     * @param float $latitude
     * @param float $longitude
     * @param float $elevation
     * @param \DateTime $time
     * @param float $magvar
     * @param float $geoidheight
     * @param string $name
     * @param string $comment
     * @param string $description
     * @param string $source
     * @param Link[] $links
     * @param string $symbol
     * @param string $type
     * @param string $fix
     * @param int $satellites
     * @param float $hdop
     * @param float $vdop
     * @param float $pdop
     * @param float $ageofdgpsdata
     * @param int $dgpsid
     * @param Extensions $extensions
     */
    public function __construct($latitude, $longitude, $elevation = null, $time = null, $magvar = null, $geoidheight = null, $name = null, $comment = null, $description = null, $source = null, array $links = null, $symbol = null, $type = null, $fix = null, $satellites = null, $hdop = null, $vdop = null, $pdop = null, $ageofdgpsdata = null, $dgpsid = null, Extensions $extensions = null)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->elevation = $elevation;
        $this->time = $time;
        $this->magvar = $magvar;
        $this->geoidheight = $geoidheight;
        $this->name = $name;
        $this->comment = $comment;
        $this->description = $description;
        $this->source = $source;
        $this->links = $links;
        $this->symbol = $symbol;
        $this->type = $type;
        $this->fix = $fix;
        $this->satellites = $satellites;
        $this->hdop = $hdop;
        $this->vdop = $vdop;
        $this->pdop = $pdop;
        $this->ageofdgpsdata = $ageofdgpsdata;
        $this->dgpsid = $dgpsid;
        $this->extensions = $extensions;
    }

    /**
     * @return float
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param float $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return float
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param float $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return float
     */
    public function getElevation()
    {
        return $this->elevation;
    }

    /**
     * @param float $elevation
     */
    public function setElevation($elevation)
    {
        $this->elevation = $elevation;
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
     * @return float
     */
    public function getMagvar()
    {
        return $this->magvar;
    }

    /**
     * @param float $magvar
     */
    public function setMagvar($magvar)
    {
        $this->magvar = $magvar;
    }

    /**
     * @return float
     */
    public function getGeoidheight()
    {
        return $this->geoidheight;
    }

    /**
     * @param float $geoidheight
     */
    public function setGeoidheight($geoidheight)
    {
        $this->geoidheight = $geoidheight;
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
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
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
     * @return string
     */
    public function getFix()
    {
        return $this->fix;
    }

    /**
     * @param string $fix
     */
    public function setFix($fix)
    {
        $this->fix = $fix;
    }

    /**
     * @return int
     */
    public function getSatellites()
    {
        return $this->satellites;
    }

    /**
     * @param int $satellites
     */
    public function setSatellites($satellites)
    {
        $this->satellites = $satellites;
    }

    /**
     * @return float
     */
    public function getHdop()
    {
        return $this->hdop;
    }

    /**
     * @param float $hdop
     */
    public function setHdop($hdop)
    {
        $this->hdop = $hdop;
    }

    /**
     * @return float
     */
    public function getVdop()
    {
        return $this->vdop;
    }

    /**
     * @param float $vdop
     */
    public function setVdop($vdop)
    {
        $this->vdop = $vdop;
    }

    /**
     * @return float
     */
    public function getPdop()
    {
        return $this->pdop;
    }

    /**
     * @param float $pdop
     */
    public function setPdop($pdop)
    {
        $this->pdop = $pdop;
    }

    /**
     * @return float
     */
    public function getAgeofdgpsdata()
    {
        return $this->ageofdgpsdata;
    }

    /**
     * @param float $ageofdgpsdata
     */
    public function setAgeofdgpsdata($ageofdgpsdata)
    {
        $this->ageofdgpsdata = $ageofdgpsdata;
    }

    /**
     * @return int
     */
    public function getDgpsid()
    {
        return $this->dgpsid;
    }

    /**
     * @param int $dgpsid
     */
    public function setDgpsid($dgpsid)
    {
        $this->dgpsid = $dgpsid;
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
     * @return Waypoint
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        $attributes = $xml->attributes();

        if ( ! $latitude = $attributes['lat']) {
            throw new InvalidGPXException("No latitude specified on waypoint node.");
        }

        if ( ! $longitude = $attributes['lon']) {
            throw new InvalidGPXException("No longitude specified on waypoint node.");
        }

        $waypoint = new Waypoint((float) $latitude, (float) $longitude);

        if ( ! empty($xml->ele)) {
            $waypoint->setElevation((float) $xml->ele[0]);
        }

        if ( ! empty($xml->time)) {
            $waypoint->setTime(strtotime((string) $xml->time[0]));
        }

        if ( ! empty($xml->magvar)) {
            $waypoint->setMagvar((float) $xml->magvar[0]);
        }

        if ( ! empty($xml->geoidheight)) {
            $waypoint->setGeoidheight((float) $xml->geoidheight[0]);
        }

        if ( ! empty($xml->name)) {
            $waypoint->setName((string) $xml->name[0]);
        }

        if ( ! empty($xml->cmt)) {
            $waypoint->setComment((string) $xml->cmt[0]);
        }

        if ( ! empty($xml->desc)) {
            $waypoint->setDescription((string) $xml->desc[0]);
        }

        if ( ! empty($xml->src)) {
            $waypoint->setSource((string) $xml->src[0]);
        }

        if ( ! empty($xml->link)) {
            $links = [];

            foreach($xml->link as $link) {
                array_push($links, Link::fromXML($link));
            }

            $waypoint->setLinks($links);
        }

        if ( ! empty($xml->sym)) {
            $waypoint->setSymbol((string) $xml->sym[0]);
        }

        if ( ! empty($xml->type)) {
            $waypoint->setType((string) $xml->type[0]);
        }

        if ( ! empty($xml->fix)) {
            $waypoint->setFix((string) $xml->fix[0]);
        }

        if ( ! empty($xml->sat)) {
            $waypoint->setFix((int) $xml->sat[0]);
        }

        if ( ! empty($xml->hdop)) {
            $waypoint->setHdop((float) $xml->hdop[0]);
        }

        if ( ! empty($xml->vdop)) {
            $waypoint->setVdop((float) $xml->vdop[0]);
        }

        if ( ! empty($xml->pdop)) {
            $waypoint->setPdop((float) $xml->pdop[0]);
        }

        if ( ! empty($xml->ageofdgpsdata)) {
            $waypoint->setAgeofdgpsdata((float) $xml->ageofdgpsdata[0]);
        }

        if ( ! empty($xml->dgpsid)) {
            $waypoint->setDgpsid((int) $xml->dgpsid[0]);
        }

        if ( ! empty($xml->extensions)) {
            $waypoint->setExtensions(Extensions::fromXML($xml->extensions[0]));
        }

        return $waypoint;
    }
}