<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

class CompanyBasicV2
{
    /**
     * KvK number, identifying number for a registration in the Netherlands Business Register. Consists of 8 digits
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $kvkNumber;

    /**
     * Branch number (Vestigingsnummer), identifying number of a branch. Consists of 12 digits
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $branchNumber;

    /**
     * RSIN is an identification number for legal entities and partnerships. Consist of only digits
     *
     * @JMS\Type("string")
     *
     * @var string
     */
    protected $rsin;

    /**
     * Trade names under which company or subsidiary operates
     *
     * @JMS\Type(CompanySearchV2TradeNames::class)
     *
     * @var CompanySearchV2TradeNames
     */
    protected $tradeNames;

    /**
     * Indication the registry does not want to be contacted by third parties
     *
     * @JMS\Accessor("getter": "hasNonMailingIndication")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $hasNonMailingIndication;

    /**
     * Indicates if the entry is registered
     *
     * @JMS\Accessor("getter": "hasEntryInBusinessRegister")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $hasEntryInBusinessRegister;

    /**
     * Indication the registry is the legal entity
     *
     * @JMS\Accessor("getter": "isLegalPerson")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $isLegalPerson;

    /**
     * Indication (true/false) as to whether this is a branch
     *
     * @JMS\Accessor("getter": "isBranch")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $isBranch;

    /**
     * Indication (true/false) for the main branch
     *
     * @JMS\Accessor("getter": "isMainBranch")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    protected $isMainBranch;

    /**
     * The address for the registry. At most 1 address is returned
     *
     * @JMS\Type("array<DMT\KvK\Api\Model\CompanySearchV2Address>")
     *
     * @var CompanySearchV2Address[]
     */
    protected $addresses;

    /**
     * Returns websites belonging to the currently registered entity
     *
     * @JMS\Type("array<string>")
     *
     * @var array
     */
    protected $websites;

    /**
     * @return string
     */
    public function getKvkNumber(): string
    {
        return $this->kvkNumber;
    }

    /**
     * @param string $kvkNumber
     */
    public function setKvkNumber(string $kvkNumber): void
    {
        $this->kvkNumber = $kvkNumber;
    }

    /**
     * @return string
     */
    public function getBranchNumber(): string
    {
        return $this->branchNumber;
    }

    /**
     * @param string $branchNumber
     */
    public function setBranchNumber(string $branchNumber): void
    {
        $this->branchNumber = $branchNumber;
    }

    /**
     * @return string
     */
    public function getRsin(): string
    {
        return $this->rsin;
    }

    /**
     * @param string $rsin
     */
    public function setRsin(string $rsin): void
    {
        $this->rsin = $rsin;
    }

    /**
     * @return CompanySearchV2TradeNames
     */
    public function getTradeNames(): CompanySearchV2TradeNames
    {
        return $this->tradeNames;
    }

    /**
     * @param CompanySearchV2TradeNames $tradeNames
     */
    public function setTradeNames(CompanySearchV2TradeNames $tradeNames): void
    {
        $this->tradeNames = $tradeNames;
    }

    /**
     * @return bool
     */
    public function hasEntryInBusinessRegister(): bool
    {
        return $this->hasEntryInBusinessRegister;
    }

    /**
     * @param bool $hasEntryInBusinessRegister
     */
    public function setHasEntryInBusinessRegister(bool $hasEntryInBusinessRegister): void
    {
        $this->hasEntryInBusinessRegister = $hasEntryInBusinessRegister;
    }

    /**
     * @return bool
     */
    public function isHasNonMailingIndication(): bool
    {
        return $this->hasNonMailingIndication;
    }

    /**
     * @param bool $hasNonMailingIndication
     */
    public function setHasNonMailingIndication(bool $hasNonMailingIndication): void
    {
        $this->hasNonMailingIndication = $hasNonMailingIndication;
    }

    /**
     * @return bool
     */
    public function isLegalPerson(): bool
    {
        return $this->isLegalPerson;
    }

    /**
     * @param bool $isLegalPerson
     */
    public function setIsLegalPerson(bool $isLegalPerson): void
    {
        $this->isLegalPerson = $isLegalPerson;
    }

    /**
     * @return bool
     */
    public function isBranch(): bool
    {
        return $this->isBranch;
    }

    /**
     * @param bool $isBranch
     */
    public function setIsBranch(bool $isBranch): void
    {
        $this->isBranch = $isBranch;
    }

    /**
     * @return bool
     */
    public function isMainBranch(): bool
    {
        return $this->isMainBranch;
    }

    /**
     * @param bool $isMainBranch
     */
    public function setIsMainBranch(bool $isMainBranch): void
    {
        $this->isMainBranch = $isMainBranch;
    }

    /**
     * @return CompanySearchV2Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param CompanySearchV2Address[] $addresses
     */
    public function setAddresses(array $addresses): void
    {
        $this->addresses = $addresses;
    }

    /**
     * @return array
     */
    public function getWebsites(): array
    {
        return $this->websites;
    }

    /**
     * @param array $websites
     */
    public function setWebsites(array $websites): void
    {
        $this->websites = $websites;
    }
}