<?php

namespace DMT\KvK\Api\Http\Response;

use DMT\KvK\Api\Model\CompanyExtendedV2ResultData;
use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyExtendedV2Result
 */
class CompanyExtendedV2Result
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
     * @JMS\Type("DMT\KvK\Api\Model\CompanyExtendedV2ResultData")
     *
     * @var CompanyExtendedV2ResultData
     */
    public $data;
}
