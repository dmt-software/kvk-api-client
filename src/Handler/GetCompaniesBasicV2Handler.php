<?php

namespace DMT\KvK\Api\Handler;

use DMT\KvK\Api\Request\GetCompaniesBasicV2;
use DMT\KvK\Api\Model\CompanyBasicV2ResultData;
use DMT\KvK\Api\Model\ResultData;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GetCompaniesBasicV2Handler
 */
class GetCompaniesBasicV2Handler implements HandlerInterface
{
    /** @var Client */
    protected $client;

    /** @var SerializerInterface */
    protected $serializer;

    /**
     * GetCompaniesBasicV2Handler constructor.
     *
     * @param Client $client
     * @param SerializerInterface|null $serializer
     */
    public function __construct(Client $client, SerializerInterface $serializer = null)
    {
        $this->client = $client;
        $this->serializer = $serializer ?? SerializerBuilder::create()->build();
    }

    /**
     * Fetch result from service.
     *
     * @param GetCompaniesBasicV2 $command
     * @return ResultData
     * @throws ClientExceptionInterface
     */
    public function handle(GetCompaniesBasicV2 $command): ResultData
    {
        $request = new Request(
            'GET',
            (new Uri('search/companies'))->withQuery(
                http_build_query($this->serializer->toArray($command))
            )
        );

        $response = $this->client->sendRequest($request);

        return $this->serializer->deserialize($response->getBody(), CompanyBasicV2ResultData::class, 'json');
    }
}