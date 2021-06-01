<?php

namespace DMT\Test\KvK\Api\Http;

use DMT\KvK\Api\Http\GetCompaniesBasicV2Handler;
use DMT\KvK\Api\Http\Request\GetCompaniesBasicV2;
use DMT\KvK\Api\Http\Response\CompanyBasicV2Result;
use DMT\KvK\Api\Model\CompanyBasicV2;
use DMT\KvK\Api\Model\CompanyBasicV2ResultData;
use DMT\KvK\Api\Model\CompanySearchV2Address;
use DMT\KvK\Api\Model\CompanySearchV2TradeNames;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response as HttpResponse;
use PHPUnit\Framework\TestCase;

/**
 * Class GetCompaniesBasicV2HandlerTest
 */
class GetCompaniesBasicV2HandlerTest extends TestCase
{
    public function testHandle()
    {
        $number = '01000442';
        $httpClient = new HttpClient([
            'handler' => HandlerStack::create(
                new MockHandler([new HttpResponse(200, ['Content-Type' => 'application/json'], $this->getResponse($number))])
            )
        ]);

        $handler = new GetCompaniesBasicV2Handler($httpClient);
        /** @var CompanyBasicV2Result $response */
        $response = $handler->handle(new GetCompaniesBasicV2());

        $this->assertInstanceOf(CompanyBasicV2Result::class, $response);
        $this->assertInstanceOf(CompanyBasicV2ResultData::class, $response->data);
        $this->assertContainsOnlyInstancesOf(CompanyBasicV2::class, $response->data->items);
        $this->assertContainsOnlyInstancesOf(CompanySearchV2Address::class, $response->data->items[0]->addresses);
        $this->assertInstanceOf(CompanySearchV2TradeNames::class, $response->data->items[0]->tradeNames);
        $this->assertSame($number, $response->data->items[0]->kvkNumber);
    }

    protected function getResponse(string $number): string
    {
        return json_encode([
            'apiVersion' => "2.0",
            'data' => [
                'itemsPerPage' => 10,
                'startPage' => 1,
                'totalItems' => 20,
                'items' => [
                    [
                        'kvkNumber' => $number,
                        'branchNumber' => '013462430019',
                        'tradeNames' => [
                            'currentStatutoryNames' => [
                                'Company & Co'
                            ]
                        ],
                        'addresses' => [
                            [],
                        ],
                    ],
                ]
            ]
        ]);
    }
}
