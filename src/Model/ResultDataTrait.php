<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

trait ResultDataTrait
{
    /**
     * Amount of search results per page used for the query
     *
     * @JMS\Type("int")
     * @var int
     */
    protected $itemsPerPage;

    /**
     * The current page of the results
     *
     * @JMS\Type("int")
     * @var int
     */
    protected $startPage;

    /**
     * Total amount of results spread over multiple pages
     *
     * @JMS\Type("int")
     * @var int
     */
    protected $totalItems;

    /**
     * Link to next set of ItemsPerPage result items
     *
     * @JMS\Type("string")
     * @var string
     */
    protected $nextLink;

    /**
     * Link to previous set of ItemsPerPage result items
     *
     * @JMS\Type("string")
     * @var string
     */
    protected $previousLink;

    /**
     * Original query
     *
     * @JMS\Type("string")
     * @var string
     */
    protected $query;

    /**
     * @return array
     */
    abstract public function getItems(): array;

    /**
     * @param array $items
     */
    abstract public function setItems(array $items): void;

    /**
     * @return int
     */
    public function getItemsPerPage(): int
    {
        return $this->itemsPerPage;
    }

    /**
     * @param int $itemsPerPage
     */
    public function setItemsPerPage(int $itemsPerPage): void
    {
        $this->itemsPerPage = $itemsPerPage;
    }

    /**
     * @return int
     */
    public function getStartPage(): int
    {
        return $this->startPage;
    }

    /**
     * @param int $startPage
     */
    public function setStartPage(int $startPage): void
    {
        $this->startPage = $startPage;
    }

    /**
     * @return int
     */
    public function getTotalItems(): int
    {
        return $this->totalItems;
    }

    /**
     * @param int $totalItems
     */
    public function setTotalItems(int $totalItems): void
    {
        $this->totalItems = $totalItems;
    }

    /**
     * @return string
     */
    public function getNextLink(): string
    {
        return $this->nextLink;
    }

    /**
     * @param string $nextLink
     */
    public function setNextLink(string $nextLink): void
    {
        $this->nextLink = $nextLink;
    }

    /**
     * @return string
     */
    public function getPreviousLink(): string
    {
        return $this->previousLink;
    }

    /**
     * @param string $previousLink
     */
    public function setPreviousLink(string $previousLink): void
    {
        $this->previousLink = $previousLink;
    }

    /**
     * @return string
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * @param string $query
     */
    public function setQuery(string $query): void
    {
        $this->query = $query;
    }
}