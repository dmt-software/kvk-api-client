<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyBasicV2
 */
class CompanyBasicV2
{
    /**
     * KvK number, identifying number for a registration in the Netherlands Business Register. Consists of 8 digits
     *
     * @JMS\SerializedName("kvkNumber")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $kvkNumber;

    /**
     * Branch number (Vestigingsnummer), identifying number of a branch. Consists of 12 digits
     *
     * @JMS\SerializedName("branchNumber")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $branchNumber;

    /**
     * RSIN is an identification number for legal entities and partnerships. Consist of only digits
     *
     * @JMS\SerializedName("rsin")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $rsin;

    /**
     * Trade names under which company or subsidiary operates
     *
     * @JMS\SerializedName("tradeNames")
     * @JMS\Type("DMT\KvK\Api\Model\CompanySearchV2TradeNames")
     *
     * @var CompanySearchV2TradeNames
     */
    public $tradeNames;

    /**
     * Indication the registry does not want to be contacted by third parties
     *
     * @JMS\SerializedName("hasNonMailingIndication")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    public $hasNonMailingIndication;

    /**
     * Indicates if the entry is registered
     *
     * @JMS\SerializedName("hasEntryInBusinessRegister")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    public $hasEntryInBusinessRegister;

    /**
     * Indication the registry is the legal entity
     *
     * @JMS\SerializedName("isLegalPerson")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    public $isLegalPerson;

    /**
     * Indication (true/false) as to whether this is a branch
     *
     * @JMS\SerializedName("isBranch")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    public $isBranch;

    /**
     * Indication (true/false) for the main branch
     *
     * @JMS\SerializedName("isMainBranch")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    public $isMainBranch;

    /**
     * The address for the registry. At most 1 address is returned
     *
     * @JMS\SerializedName("addresses")
     * @JMS\Type("array<DMT\KvK\Api\Model\CompanySearchV2Address>")
     *
     * @var CompanySearchV2Address[]
     */
    public $addresses;

    /**
     * Returns websites belonging to the currently registered entity
     *
     * @JMS\SerializedName("websites")
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    public $websites;
}
