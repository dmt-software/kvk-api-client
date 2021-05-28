<?php

namespace DMT\KvK\Api;

/**
 * Class Config
 */
class Config
{
    /**
     * The soap end point.
     *
     * @var string $baseUri
     */
    public $baseUri = 'https://api.kvk.nl/api/v2/';

    /**
     * The api key.
     *
     * @var string $userKey
     */
    public $userKey;

    /**
     * Config constructor.
     *
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        foreach ($options as $property => $value) {
            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }
}