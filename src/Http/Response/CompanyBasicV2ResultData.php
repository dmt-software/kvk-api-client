<?php

namespace DMT\KvK\Api\Http\Response;

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
     * @JMS\Type("array<DMT\KvK\Api\Model\CompanyBasicV2>")
     *
     * @var CompanyBasicV2[]
     */
    protected $items;
}