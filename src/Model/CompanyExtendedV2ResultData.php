<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyExtendedV2ResultData
 */
class CompanyExtendedV2ResultData implements ResultData
{
    use ResultDataTrait;

    /**
     * Actual search results
     *
     * @JMS\SerializedName("items")
     * @JMS\Type("array<DMT\KvK\Api\Model\CompanyExtendedV2>")
     *
     * @var CompanyExtendedV2[]
     */
    public $items;
}
