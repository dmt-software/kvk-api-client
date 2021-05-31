<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyProfileV2Address
 */
class CompanyProfileV2Address
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
     * @JMS\SerializedName("bagId")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $bagId;

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

    /**
     * @JMS\SerializedName("gpsLatitude")
     * @JMS\Type("float")
     *
     * @var float
     */
    public $gpsLatitude;

    /**
     * @JMS\SerializedName("gpsLongitude")
     * @JMS\Type("float")
     *
     * @var float
     */
    public $gpsLongitude;

    /**
     * @JMS\SerializedName("rijksdriehoekX")
     * @JMS\Type("float")
     *
     * @var float
     */
    public $rijksdriehoekX;

    /**
     * @JMS\SerializedName("rijksdriehoekY")
     * @JMS\Type("float")
     *
     * @var float
     */
    public $rijksdriehoekY;

    /**
     * @JMS\SerializedName("rijksdriehoekZ")
     * @JMS\Type("float")
     *
     * @var float
     */
    public $rijksdriehoekZ;
}
