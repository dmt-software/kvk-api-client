<?php

namespace DMT\KvK\Api\Http;

use DMT\KvK\Api\Http\Request\GetCompaniesBasicV2;
use DMT\KvK\Api\Http\Response\CompanyBasicV2Result;
use DMT\KvK\Api\Serializer\JsonSerializer;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GetCompaniesBasicV2Handler
 */
class GetCompaniesBasicV2Handler implements HandlerInterface
{
    /** @var HttpClient */
    protected $client;

    /** @var SerializerInterface */
    protected $serializer;

    /**
     * GetCompaniesBasicV2Handler constructor.
     *
     * @param HttpClient $client
     * @param SerializerInterface|null $serializer
     */
    public function __construct(HttpClient $client, SerializerInterface $serializer = null)
    {
        $this->client = $client;
        $this->serializer = $serializer ?? new JsonSerializer();
    }

    /**
     * Fetch result from service.
     *
     * @param GetCompaniesBasicV2 $command
     * @return CompanyBasicV2Result
     * @throws ClientExceptionInterface
     */
    public function handle(GetCompaniesBasicV2 $command): CompanyBasicV2Result
    {
        $request = new Request(
            'GET',
            (new Uri('search/companies'))->withQuery(
                http_build_query($this->serializer->toArray($command))
            )
        );

        $response = $this->client->sendRequest($request);

        return $this->serializer->deserialize($response->getBody(), CompanyBasicV2Result::class, 'json');
    }
}
