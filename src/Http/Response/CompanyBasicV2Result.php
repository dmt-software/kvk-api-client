<?php

namespace DMT\KvK\Api\Http\Response;

use DMT\KvK\Api\Model\CompanyBasicV2ResultData;
use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyBasicV2Result
 */
class CompanyBasicV2Result
{
    /**
     * @JMS\SerializedName("apiVersion")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $apiVersion = '2.0';

    /**
     * @JMS\Exclude()
     * @JMS\SerializedName("meta")
     *
     * @var null
     */
    public $meta;

    /**
     * @JMS\SerializedName("data")
     * @JMS\Type("DMT\KvK\Api\Model\CompanyBasicV2ResultData")
     *
     * @var CompanyBasicV2ResultData
     */
    public $data;
}
