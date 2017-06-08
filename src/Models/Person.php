<?php

namespace GPXParser\Models;

use GPXParser\InvalidGPXException;

class Person implements FromXML
{
    /** @var  string */
    protected $name;

    /** @var  Email */
    protected $email;

    /** @var  Link */
    protected $link;

    /**
     * Person constructor.
     * @param string $name
     * @param Email $email
     * @param Link $link
     */
    public function __construct($name = null, Email $email = null, Link $link = null)
    {
        $this->name = $name;
        $this->email = $email;
        $this->link = $link;
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
     * @return Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param Email $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return Link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @param Link $link
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * @param \SimpleXMLElement $xml
     * @return Person
     * @throws InvalidGPXException
     */
    public static function fromXML(\SimpleXMLElement $xml)
    {
        $person = new Person();

        if ( ! empty($xml->name)) {
            $person->setName((string) $xml->name[0]);
        }

        if ( ! empty($xml->email)) {
            $person->setEmail(Email::fromXML($xml->email[0]));
        }

        if ( ! empty($xml->link)) {
            $person->setLink(Link::fromXML($xml->link[0]));
        }

        return $person;
    }
}