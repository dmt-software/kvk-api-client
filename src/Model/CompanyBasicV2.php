<?php

namespace DMT\Kvk\Api\Model;

class CompanyBasicV2
{
    /**
     * CKvK number, identifying number for a registration in the Netherlands Business Register. Consists of 8 digits
     *
     * @var string
     */
    protected $kvkNumber;

    /**
     *Branch number (Vestigingsnummer), identifying number of a branch. Consists of 12 digits
     *
     * @var string
     */
    protected $branchNumber;

    /**
     * RSIN is an identification number for legal entities and partnerships. Consist of only digits
     *
     * @var string
     */
    protected $rsin;

    /**
     * Trade names under which company or subsidiary operates
     *
     * @var CompanySearchV2TradeNames
     */
    protected $tradeNames;

    /**
     * Indicates if the entry is registered
     *
     * @var bool
     */
    protected $hasEntryInBusinessRegister;

    /**
     * Indication the registry does not want to be contacted by third parties
     *
     * @var bool
     */
    protected $hasNonMailingIndication;

    /**
     * Indication the registry is the legal entity
     *
     * @var bool
     */
    protected $isLegalPerson;

    /**
     * Indication (true/false) as to whether this is a branch
     *
     * @var bool
     */
    protected $isBranch;

    /**
     * Indication (true/false) for the main branch
     *
     * @var bool
     */
    protected $isMainBranch;

    /**
     * The address for the registry. At most 1 address is returned
     *
     * @var CompanySearchV2Address[]
     */
    protected $addresses;

    /**
     * Returns websites belonging to the currently registered entity
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
    public function isHasEntryInBusinessRegister(): bool
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
     * @return array
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    /**
     * @param array $addresses
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