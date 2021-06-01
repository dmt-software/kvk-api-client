<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyBasicV2ResultData
 */
class CompanyBasicV2ResultData implements ResultData
{
    use ResultDataTrait;

    /**
     * Actual search results
     *
     * @JMS\SerializedName("items")
     * @JMS\Type("array<DMT\KvK\Api\Model\CompanyBasicV2>")
     *
     * @var CompanyBasicV2[]
     */
    public $items;
}