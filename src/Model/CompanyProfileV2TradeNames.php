<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyProfileV2TradeNames
 *
 * The name(s) under which a company or a branch of a company operates.
 */
class CompanyProfileV2TradeNames
{
    /**
     * @JMS\SerializedName("businessName")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $businessName;

    /**
     * @JMS\SerializedName("shortBusinessName")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $shortBusinessName;

    /**
     * @JMS\SerializedName("currentTradeNames")
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $currentTradeNames;

    /**
     * @JMS\SerializedName("formerTradeNames")
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $formerTradeNames;

    /**
     * @JMS\SerializedName("currentStatutoryNames")
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $currentStatutoryNames;

    /**
     * @JMS\SerializedName("formerStatutoryNames")
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $formerStatutoryNames;

    /**
     * @JMS\SerializedName("currentNames")
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $currentNames;

    /**
     * @JMS\SerializedName("formerNames")
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $formerNames;
}
