<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class Email implements FromXML
{
    /** @var  string */
    protected $id;

    /** @var  string */
    protected $domain;

    /**
     * Email constructor.
     * @param string $id
     * @param string $domain
     */
    public function __construct($id, $domain)
    {
        $this->id = $id;
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return Email
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        $attributes = $xml->attributes();

        if ( ! $id = $attributes['id']) {
            throw new InvalidGPXException("No id specified on email node.");
        }

        if ( ! $domain = $attributes['domain']) {
            throw new InvalidGPXException("No domain specified on email node.");
        }

        $email = new Email((string) $id, (string) $domain);

        return $email;
    }
}