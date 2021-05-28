<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanySearchV2TradeNames
 *
 * The name(s) under which a company or a branch of a company operates.
 */
class CompanySearchV2TradeNames
{
    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $businessName;

    /**
     * @JMS\Type("string")
     *
     * @var string
     */
    public $shortBusinessName;

    /**
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $currentTradeNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $formerTradeNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $currentStatutoryNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $formerStatutoryNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $currentNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $formerNames;
}
