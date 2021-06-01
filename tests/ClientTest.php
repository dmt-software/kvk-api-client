<?php

namespace DMT\Test\KvK\Api;

use DMT\KvK\Api\Client;
use DMT\KvK\Api\Config;
use DMT\KvK\Api\Http\GetCompaniesBasicV2Handler;
use DMT\KvK\Api\Http\GetCompaniesExtendedV2Handler;
use DMT\KvK\Api\Http\Request\GetCompaniesBasicV2;
use DMT\KvK\Api\Http\Request\GetCompaniesExtendedV2;
use DMT\KvK\Api\Http\Request\RequestInterface;
use DMT\KvK\Api\Http\Response\CompanyBasicV2Result;
use DMT\KvK\Api\Http\Response\CompanyExtendedV2Result;
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
            CompanyBasicV2Result::class,
            $this->client->getCompaniesBasicV2('90000102')
        );
    }

    public function testGetCompaniesExtendedV2()
    {
        $this->assertInstanceOf(
            CompanyExtendedV2Result::class,
            $this->client->getCompaniesExtendedV2('69599076')
        );
    }

    public function testProcess()
    {
        $this->assertInstanceOf(
            CompanyBasicV2Result::class,
            $this->client->process(new GetCompaniesBasicV2())
        );
    }

    public function testProcessIllegalRequest()
    {
        $this->expectExceptionObject(new \InvalidArgumentException('Illegal command given'));

        $mock = $this->getMockBuilder(RequestInterface::class)
            ->getMockForAbstractClass();

        $client = new Client(new Config(['userKey' => '1234/d']));
        $client->process($mock);
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

        if ($command === GetCompaniesExtendedV2::class) {
            return new GetCompaniesExtendedV2Handler($httpClient);
        }

        return new GetCompaniesBasicV2Handler($httpClient);
    }
}
