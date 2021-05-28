<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait ResultDataTrait
 */
trait ResultDataTrait
{
    /**
     * Amount of search results per page used for the query
     *
     * @JMS\Type("int")
     * @var int $itemsPerPage
     */
    public $itemsPerPage;

    /**
     * The current page of the results
     *
     * @JMS\Type("int")
     * @var int $startPage
     */
    public $startPage;

    /**
     * Total amount of results spread over multiple pages
     *
     * @JMS\Type("int")
     * @var int $totalItems
     */
    public $totalItems;

    /**
     * Link to next set of ItemsPerPage result items
     *
     * @JMS\Type("string")
     * @var string $nextLink
     */
    public $nextLink;

    /**
     * Link to previous set of ItemsPerPage result items
     *
     * @JMS\Type("string")
     * @var string $previousLink
     */
    public $previousLink;

    /**
     * Original query
     *
     * @JMS\Type("string")
     * @var string $query
     */
    public $query;
}
