<?php

namespace DMT\KvK\Api\Model;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyExtendedV2
 */
class CompanyExtendedV2
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
     * @JMS\Type("DMT\KvK\Api\Model\CompanyProfileV2TradeNames")
     *
     * @var CompanyProfileV2TradeNames
     */
    public $tradeNames;

    /**
     * Company legal form.
     *
     * @JMS\SerializedName("legalForm")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $legalForm;
    /**
     *
     * @JMS\SerializedName("businessActivities")
     * @JMS\Type("array<DMT\KvK\Api\Model\CompanyProfileV2BusinessActivity>")
     *
     * @var CompanyProfileV2BusinessActivity[]
     */
    public $businessActivities;

    /**
     * Indicates if the entry is registered
     *
     * @JMS\SerializedName("hasEntryInBusinessRegister")
     * @JMS\Type("bool")
     *
     * @var
     */
    public $hasEntryInBusinessRegister;

    /**
     * Indication the entity is engaged in commercial activities.
     *
     * @JMS\SerializedName("hasCommercialActivities")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    public $hasCommercialActivities;

    /**
     * Indicates if the information from the Register may be forwarded and/or used by third parties for mailing/contact
     * purpose.
     *
     * @JMS\SerializedName("hasNonMailingIndication")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    public $hasNonMailingIndication;

    /**
     * Indication the registry is the legal entity.
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
     * Total number of employees within the branch/file.
     *
     * @JMS\SerializedName("employees")
     * @JMS\Type("int")
     *
     * @var int
     */
    public $employees;

    /**
     * The date on which the branch/legal entity was founded.
     *
     * @JMS\SerializedName("foundationDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     *
     * @var DateTime
     */
    public $foundationDate;

    /**
     * The date on which the branch/legal entity was registered in its current regional Business Register.
     *
     * @JMS\SerializedName("registrationDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     *
     * @var DateTime
     */
    public $registrationDate;

    /**
     * The date on which the branch/legal entity became inactive in the Business Register.
     *
     * @JMS\SerializedName("deregistrationDate")
     * @JMS\Type("DateTime<'Y-m-d'>")
     *
     * @var DateTime
     */
    public $deregistrationDate;

    /**
     * The addresses for the registry.
     *
     * @JMS\SerializedName("addresses")
     * @JMS\Type("array<DMT\KvK\Api\Model\CompanyProfileV2Address>")
     *
     * @var CompanyProfileV2Address[]
     */
    public $addresses;

    /**
     * Returns websites belonging to the currently registered entity
     *
     * @JMS\SerializedName("websites")
     * @JMS\Type("array<string>")
     *
     * @var string[]
     */
    public $websites;
}
