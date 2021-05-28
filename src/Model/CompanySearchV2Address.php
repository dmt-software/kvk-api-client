<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanySearchV2Address
 */
class CompanySearchV2Address
{
    /**
     * The address type.
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    public $type;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $street;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $houseNumber;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $houseNumberAddition;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $postalCode;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $city;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $country;
}
