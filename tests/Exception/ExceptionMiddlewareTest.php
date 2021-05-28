<?php

namespace DMT\Test\KvK\Api\Exception;

use DMT\CommandBus\Validator\ValidationException;
use DMT\KvK\Api\Exception\Exception;
use DMT\KvK\Api\Exception\ExceptionMiddleware;
use DMT\KvK\Api\Exception\RequestException;
use DMT\KvK\Api\Exception\ResponseException;
use DMT\KvK\Api\Exception\UnavailableException;
use DMT\KvK\Api\Http\Request\GetCompaniesBasicV2;
use GuzzleHttp\Exception\ConnectException;
use JMS\Serializer\Exception\ObjectConstructionException;
use PHPUnit\Framework\TestCase;

/**
 * Class ExceptionMiddlewareTest
 */
class ExceptionMiddlewareTest extends TestCase
{
    /**
     * @dataProvider provideException
     *
     * @param \Exception $exception
     * @param string $expected
     *
     * @throws Exception
     */
    public function testException(\Exception $exception, string $expected)
    {
        $this->expectException($expected);

        $middleware = new ExceptionMiddleware();
        $middleware->execute(new GetCompaniesBasicV2(), function () use ($exception) {
            throw $exception;
        });
    }

    public function provideException(): iterable
    {
        return [
            [new ConnectException('oops', new   \GuzzleHttp\Psr7\Request('POST', '/')), UnavailableException::class],
            [new UnavailableException('passed on'), UnavailableException::class],
            [new ObjectConstructionException('can not initialize class'), UnavailableException::class],
            [new ResponseException('Not found'), ResponseException::class],
            [new ValidationException('invalid request'), RequestException::class],
        ];
    }
}
