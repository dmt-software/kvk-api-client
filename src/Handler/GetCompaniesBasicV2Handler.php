<?php

namespace DMT\KvK\Api\Handler;

use DMT\KvK\Api\Command\GetCompaniesBasicV2;
use DMT\Kvk\Api\Model\CompanyBasicV2ResultData;
use DMT\Kvk\Api\Model\ResultData;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;

class GetCompaniesBasicV2Handler
{
    /** @var Client */
    protected $client;

    /** @var Serializer */
    protected $serializer;

    /**
     * GetCompaniesBasicV2Handler constructor.
     *
     * @param Client $client
     * @param Serializer $serializer
     */
    public function __construct(Client $client, Serializer $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    /**
     * Fetch result from service.
     *
     * @param GetCompaniesBasicV2 $command
     * @return ResultData
     */
    public function handle(GetCompaniesBasicV2 $command): ResultData
    {
        $response = $this->client->get(
            'https://api.kvk.nl/api/v2/search/companies',
            [
                'query' => $this->serializer->toArray($command),
                'http_errors' => true
            ]
        );
die($response->getBody()->getContents());
        return $this->serializer->deserialize($response->getBody()->getContents(), CompanyBasicV2ResultData::class, 'json');
    }
}