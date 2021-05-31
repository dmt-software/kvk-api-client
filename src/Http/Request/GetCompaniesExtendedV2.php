<?php

namespace DMT\KvK\Api\Http\Request;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class GetCompaniesExtendedV2
 */
class GetCompaniesExtendedV2 implements RequestInterface
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
     * @var bool $includeInactiveRegistrations
     */
    public $includeInactiveRegistrations;

    /**
     * @var bool $restrictToMainBranch
     */
    public $restrictToMainBranch;

    /**
     * @var int $startPage
     */
    public $startPage;

    /**
     * @var string $context
     */
    public $context;

    /**
     * @var string $q
     */
    public $q;
}