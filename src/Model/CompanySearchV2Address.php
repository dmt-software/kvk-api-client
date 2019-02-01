<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

class CompanySearchV2Address
{
    /**
     * The address type.
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $type;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $street;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $houseNumber;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $houseNumberAddition;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $postalCode;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $city;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $country;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    /**
     * @param string $houseNumber
     */
    public function setHouseNumber(string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * @return string
     */
    public function getHouseNumberAddition(): string
    {
        return $this->houseNumberAddition;
    }

    /**
     * @param string $houseNumberAddition
     */
    public function setHouseNumberAddition(string $houseNumberAddition): void
    {
        $this->houseNumberAddition = $houseNumberAddition;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }
}