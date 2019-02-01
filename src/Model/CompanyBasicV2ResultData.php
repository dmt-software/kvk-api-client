<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyBasicV2ResultData
 *
 * @JMS\AccessType("public_method")
 */
class CompanyBasicV2ResultData
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

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param mixed $items
     */
    public function setItems($items): void
    {
        $this->items = $items;
    }
}