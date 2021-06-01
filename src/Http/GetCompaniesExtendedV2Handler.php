<?php

namespace DMT\KvK\Api\Http;

use DMT\KvK\Api\Http\Request\GetCompaniesExtendedV2;
use DMT\KvK\Api\Http\Response\CompanyExtendedV2Result;
use DMT\KvK\Api\Serializer\JsonSerializer;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class GetCompaniesExtendedV2Handler
 */
class GetCompaniesExtendedV2Handler implements HandlerInterface
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
     * @param GetCompaniesExtendedV2 $command
     * @return CompanyExtendedV2Result
     * @throws ClientExceptionInterface
     */
    public function handle(GetCompaniesExtendedV2 $command): CompanyExtendedV2Result
    {
        $request = new Request(
            'GET',
            (new Uri('profile/companies'))->withQuery(
                http_build_query($this->serializer->toArray($command))
            )
        );

        $response = $this->client->sendRequest($request);

        return $this->serializer->deserialize((string)$response->getBody(), CompanyExtendedV2Result::class, 'json');
    }
}
