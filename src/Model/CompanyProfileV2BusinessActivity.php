<?php

namespace DMT\KvK\Api\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CompanyProfileV2BusinessActivity
 */
class CompanyProfileV2BusinessActivity
{
    /**
     * Code of SBI activities in accordance with the SBI 2008.
     *
     * @JMS\SerializedName("sbiCode")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $sbiCode;

    /**
     * Code description of SBI activities.
     *
     * @JMS\SerializedName("sbiCodeDescription")
     * @JMS\Type("string")
     *
     * @var string
     */
    public $sbiCodeDescription;

    /**
     * Indication the activity is the main activity for the company.
     *
     * @JMS\SerializedName("isMainSbi")
     * @JMS\Type("bool")
     *
     * @var bool
     */
    public $isMainSbi;
}
