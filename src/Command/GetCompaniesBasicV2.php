<?php

namespace DMT\KvK\Api\Command;

use Symfony\Component\Validator\Constraints as Assert;

class GetCompaniesBasicV2 implements CommandInterface
{
    /**
     * KvK number, identifying number for a registration in the Netherlands Business Register. Consists of 8 digits
     *
     * @Assert\Regex(pattern="~^\d{8}$~", message="invalid kvkNumber given")
     *
     * @var string
     */
    protected $kvkNumber;

    /**
     * Branch number (Vestigingsnummer), identifying number of a branch. Consists of 12 digits
     *
     * @Assert\Regex(pattern="~^\d{12}$~", message="invalid branchNumber given")
     *
     * @var string
     */
    protected $branchNumber;

    /**
     * RSIN is an identification number for legal entities and partnerships. Consist of only digits
     *
     * @Assert\Regex(pattern="~^\d+$~", message="invalid rsin given")
     *
     * @var string
     */
    protected $rsin;

    /**
     * Street of an address
     *
     * @var string
     */
    protected $street;

    /**
     * House number of an address
     *
     * @var string
     */
    protected $houseNumber;

    /**
     * Postal code or ZIP code, example 1000AA
     *
     * @Assert\Regex(pattern="~^[1-9]\d{3}[A-Z]$~", message="invalid postalCode given")
     *
     * @var string
     */
    protected $postalCode;

    /**
     * City or Town name
     *
     * @var string
     */
    protected $city;

    /**
     * The name under which a company or a branch of a company operates;
     *
     * @var string
     */
    protected $tradeName;

    /**
     * Indication (true/false) to search through expired trade names and expired registered names and/or include these
     * in the results. Default is false
     *
     * @var bool
     */
    protected $includeFormerTradeNames;

    /**
     * Indication (true/false) to include searching through inactive dossiers/deregistered companies. Default is false.
     * Note: History of inactive companies is after 1 January 2013
     *
     * @var bool
     */
    protected $includeInactiveRegistrations;

    /**
     * Search includes main branches. Default is true
     *
     * @var bool
     */
    protected $mainBranch;

    /**
     * Search includes branches. Default is true
     *
     * @var bool
     */
    protected $branch;

    /**
     * Search includes legal persons. Default is true
     *
     * @var bool
     */
    protected $legalPerson;

    /**
     * Number indicating which page to fetch for pagination. Default = 1, showing the first 10 results
     *
     * @var string
     */
    protected $startPage;

    /**
     * Defines the search collection for the query
     *
     * @var string
     */
    protected $site;

    /**
     * User can optionally add a context to identify his result later on
     *
     * @var string
     */
    protected $context;

    /**
     * Free format text search for in the compiled search description.
     *
     * @var string
     */
    protected $q;

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
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = strtoupper(preg_replace('~\s~', '', $postalCode));
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
    public function getTradeName(): string
    {
        return $this->tradeName;
    }

    /**
     * @param string $tradeName
     */
    public function setTradeName(string $tradeName): void
    {
        $this->tradeName = $tradeName;
    }

    /**
     * @return bool
     */
    public function isIncludeFormerTradeNames(): bool
    {
        return $this->includeFormerTradeNames;
    }

    /**
     * @param bool $includeFormerTradeNames
     */
    public function setIncludeFormerTradeNames(bool $includeFormerTradeNames): void
    {
        $this->includeFormerTradeNames = $includeFormerTradeNames;
    }

    /**
     * @return bool
     */
    public function isIncludeInactiveRegistrations(): bool
    {
        return $this->includeInactiveRegistrations;
    }

    /**
     * @param bool $includeInactiveRegistrations
     */
    public function setIncludeInactiveRegistrations(bool $includeInactiveRegistrations): void
    {
        $this->includeInactiveRegistrations = $includeInactiveRegistrations;
    }

    /**
     * @return bool
     */
    public function isMainBranch(): bool
    {
        return $this->mainBranch;
    }

    /**
     * @param bool $mainBranch
     */
    public function setMainBranch(bool $mainBranch): void
    {
        $this->mainBranch = $mainBranch;
    }

    /**
     * @return bool
     */
    public function isBranch(): bool
    {
        return $this->branch;
    }

    /**
     * @param bool $branch
     */
    public function setBranch(bool $branch): void
    {
        $this->branch = $branch;
    }

    /**
     * @return bool
     */
    public function isLegalPerson(): bool
    {
        return $this->legalPerson;
    }

    /**
     * @param bool $legalPerson
     */
    public function setLegalPerson(bool $legalPerson): void
    {
        $this->legalPerson = $legalPerson;
    }

    /**
     * @return string
     */
    public function getStartPage(): string
    {
        return $this->startPage;
    }

    /**
     * @param string $startPage
     */
    public function setStartPage(string $startPage): void
    {
        $this->startPage = $startPage;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @param string $site
     */
    public function setSite(string $site): void
    {
        $this->site = $site;
    }

    /**
     * @return string
     */
    public function getContext(): string
    {
        return $this->context;
    }

    /**
     * @param string $context
     */
    public function setContext(string $context): void
    {
        $this->context = $context;
    }

    /**
     * @return string
     */
    public function getQ(): string
    {
        return $this->q;
    }

    /**
     * @param string $q
     */
    public function setQ(string $q): void
    {
        $this->q = $q;
    }
}