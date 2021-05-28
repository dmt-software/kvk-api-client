<?php

namespace DMT\KvK\Api\Http\Request;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class GetCompaniesBasicV2
 */
class GetCompaniesBasicV2 implements RequestInterface
{
    /**
     * KvK number, identifying number for a registration in the Netherlands Business Register. Consists of 8 digits
     *
     * @Assert\Regex(pattern="~^\d{8}$~", message="invalid kvkNumber given")
     *
     * @var string
     */
    public $kvkNumber;

    /**
     * Branch number (Vestigingsnummer), identifying number of a branch. Consists of 12 digits
     *
     * @Assert\Regex(pattern="~^\d{12}$~", message="invalid branchNumber given")
     *
     * @var string
     */
    public $branchNumber;

    /**
     * RSIN is an identification number for legal entities and partnerships. Consist of only digits
     *
     * @Assert\Regex(pattern="~^\d+$~", message="invalid rsin given")
     *
     * @var string
     */
    public $rsin;

    /**
     * Street of an address
     *
     * @var string
     */
    public $street;

    /**
     * House number of an address
     *
     * @var string
     */
    public $houseNumber;

    /**
     * Postal code or ZIP code, example 1000AA
     *
     * @Assert\Regex(pattern="~^[1-9]\d{3}[A-Z]$~", message="invalid postalCode given")
     *
     * @var string
     */
    public $postalCode;

    /**
     * City or Town name
     *
     * @var string
     */
    public $city;

    /**
     * The name under which a company or a branch of a company operates;
     *
     * @var string
     */
    public $tradeName;

    /**
     * Indication (true/false) to search through expired trade names and expired registered names and/or include these
     * in the results. Default is false
     *
     * @var bool
     */
    public $includeFormerTradeNames;

    /**
     * Indication (true/false) to include searching through inactive dossiers/deregistered companies. Default is false.
     * Note: History of inactive companies is after 1 January 2013
     *
     * @var bool
     */
    public $includeInactiveRegistrations;

    /**
     * Search includes main branches. Default is true
     *
     * @var bool
     */
    public $mainBranch;

    /**
     * Search includes branches. Default is true
     *
     * @var bool
     */
    public $branch;

    /**
     * Search includes legal persons. Default is true
     *
     * @var bool
     */
    public $legalPerson;

    /**
     * Number indicating which page to fetch for pagination. Default = 1, showing the first 10 results
     *
     * @var string
     */
    public $startPage;

    /**
     * Defines the search collection for the query
     *
     * @var string
     */
    public $site;

    /**
     * User can optionally add a context to identify his result later on
     *
     * @var string
     */
    public $context;

    /**
     * Free format text search for in the compiled search description.
     *
     * @var string
     */
    public $q;
}
