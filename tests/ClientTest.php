<?php

namespace DMT\Test\KvK\Api;

use DMT\KvK\Api\Client;
use DMT\KvK\Api\Config;
use DMT\KvK\Api\Handler\GetCompaniesBasicV2Handler;
use DMT\KvK\Api\Model\CompanyBasicV2ResultData;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response as HttpResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 */
class ClientTest extends TestCase
{
    /** @var Client $client */
    protected $client;

    public function setUp(): void
    {
        $this->client = $this->getMockBuilder(Client::class)
            ->setConstructorArgs([new Config(['userKey' => '1234\App'])])
            ->onlyMethods(['getHandler'])
            ->getMock();

        $this->client
            ->expects($this->any())
            ->method('getHandler')
            ->willReturnCallback([$this, 'getMockHandler']);
    }

    public function testGetCompaniesBasicV2()
    {
        $this->assertInstanceOf(
            CompanyBasicV2ResultData::class,
            $this->client->getCompaniesBasicV2('90000102')
        );
    }

    public function getMockHandler(string $command)
    {
        $file = preg_replace('~^.*\\\\([^\\\\]+)$~', '$1', $command);
        $body = file_get_contents(sprintf('%s/data/%s.json', __DIR__, $file));

        $response = new HttpResponse(200, ['Content-Type' => 'application/json'], $body);

        $httpClient = new HttpClient([
            'handler' => HandlerStack::create(
                new MockHandler([$response])
            )
        ]);

        return new GetCompaniesBasicV2Handler($httpClient);
    }
}
