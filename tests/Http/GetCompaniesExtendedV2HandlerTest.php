<?php

namespace DMT\Test\KvK\Api\Http;

use DMT\KvK\Api\Http\GetCompaniesExtendedV2Handler;
use DMT\KvK\Api\Http\Request\GetCompaniesExtendedV2;
use DMT\KvK\Api\Http\Response\CompanyExtendedV2Result;
use DMT\KvK\Api\Model\CompanyExtendedV2;
use DMT\KvK\Api\Model\CompanyExtendedV2ResultData;
use DMT\KvK\Api\Model\CompanyProfileV2Address;
use DMT\KvK\Api\Model\CompanyProfileV2BusinessActivity;
use DMT\KvK\Api\Model\CompanyProfileV2TradeNames;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response as HttpResponse;
use PHPUnit\Framework\TestCase;

class GetCompaniesExtendedV2HandlerTest extends TestCase
{
    public function testHandle()
    {
        $number = '01000331';
        $httpClient = new HttpClient([
            'handler' => HandlerStack::create(
                new MockHandler([new HttpResponse(200, ['Content-Type' => 'application/json'], $this->getResponse($number))])
            )
        ]);

        $handler = new GetCompaniesExtendedV2Handler($httpClient);
        /** @var CompanyExtendedV2Result $response */
        $response = $handler->handle(new GetCompaniesExtendedV2());

        $this->assertInstanceOf(CompanyExtendedV2Result::class, $response);
        $this->assertInstanceOf(CompanyExtendedV2ResultData::class, $response->data);
        $this->assertContainsOnlyInstancesOf(CompanyExtendedV2::class, $response->data->items);
        $this->assertContainsOnlyInstancesOf(CompanyProfileV2Address::class, $response->data->items[0]->addresses);
        $this->assertInstanceOf(CompanyProfileV2TradeNames::class, $response->data->items[0]->tradeNames);
        $this->assertContainsOnlyInstancesOf(CompanyProfileV2BusinessActivity::class, $response->data->items[0]->businessActivities);
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
                        'branchNumber' => '910034264310',
                        'tradeNames' => [
                            'currentStatutoryNames' => [
                                'Co & Company'
                            ]
                        ],
                        'businessActivities' => [
                            [
                                'sbiCode' => '47918',
                                'sbiCodeDescription' => 'Detailhandel via internet in een algemeen assortiment non-food',
                                'isMainSbi' => true
                            ]
                        ],
                        'addresses' => [
                            [],
                        ],
                    ],
                ],
            ]
        ]);
    }
}
