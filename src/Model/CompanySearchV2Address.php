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
     * @JMS\SerializedName("type")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $type;

    /**
     * @JMS\SerializedName("street")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $street;

    /**
     * @JMS\SerializedName("houseNumber")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $houseNumber;

    /**
     * @JMS\SerializedName("houseNumberAddition")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $houseNumberAddition;

    /**
     * @JMS\SerializedName("postalCode")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $postalCode;

    /**
     * @JMS\SerializedName("city")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $city;

    /**
     * @JMS\SerializedName("country")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $country;
}
