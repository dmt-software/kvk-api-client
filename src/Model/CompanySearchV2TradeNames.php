<?php

namespace DMT\Kvk\Api\Model;

class CompanySearchV2TradeNames
{
    /** @var string */
    protected $businessName;

    /** @var string */
    protected $shortBusinessName;

    /** @var array */
    protected $currentTradeNames;

    /** @var array */
    protected $formerTradeNames;

    /** @var array */
    protected $currentStatutoryNames;

    /** @var array */
    protected $formerStatutoryNames;

    /** @var array */
    protected $currentNames;

    /** @var array */
    protected $formerNames;

    /**
     * @return string
     */
    public function getBusinessName(): string
    {
        return $this->businessName;
    }

    /**
     * @param string $businessName
     */
    public function setBusinessName(string $businessName): void
    {
        $this->businessName = $businessName;
    }

    /**
     * @return string
     */
    public function getShortBusinessName(): string
    {
        return $this->shortBusinessName;
    }

    /**
     * @param string $shortBusinessName
     */
    public function setShortBusinessName(string $shortBusinessName): void
    {
        $this->shortBusinessName = $shortBusinessName;
    }

    /**
     * @return array
     */
    public function getCurrentTradeNames(): array
    {
        return $this->currentTradeNames;
    }

    /**
     * @param array $currentTradeNames
     */
    public function setCurrentTradeNames(array $currentTradeNames): void
    {
        $this->currentTradeNames = $currentTradeNames;
    }

    /**
     * @return array
     */
    public function getFormerTradeNames(): array
    {
        return $this->formerTradeNames;
    }

    /**
     * @param array $formerTradeNames
     */
    public function setFormerTradeNames(array $formerTradeNames): void
    {
        $this->formerTradeNames = $formerTradeNames;
    }

    /**
     * @return array
     */
    public function getCurrentStatutoryNames(): array
    {
        return $this->currentStatutoryNames;
    }

    /**
     * @param array $currentStatutoryNames
     */
    public function setCurrentStatutoryNames(array $currentStatutoryNames): void
    {
        $this->currentStatutoryNames = $currentStatutoryNames;
    }

    /**
     * @return array
     */
    public function getFormerStatutoryNames(): array
    {
        return $this->formerStatutoryNames;
    }

    /**
     * @param array $formerStatutoryNames
     */
    public function setFormerStatutoryNames(array $formerStatutoryNames): void
    {
        $this->formerStatutoryNames = $formerStatutoryNames;
    }

    /**
     * @return array
     */
    public function getCurrentNames(): array
    {
        return $this->currentNames;
    }

    /**
     * @param array $currentNames
     */
    public function setCurrentNames(array $currentNames): void
    {
        $this->currentNames = $currentNames;
    }

    /**
     * @return array
     */
    public function getFormerNames(): array
    {
        return $this->formerNames;
    }

    /**
     * @param array $formerNames
     */
    public function setFormerNames(array $formerNames): void
    {
        $this->formerNames = $formerNames;
    }
}