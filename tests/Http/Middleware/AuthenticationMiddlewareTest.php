<?php

namespace DMT\Test\KvK\Api\Http\Middleware;

use DMT\KvK\Api\Exception\AuthenticationException;
use DMT\KvK\Api\Http\Middleware\AuthenticationMiddleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

/**
 * Class AuthenticationMiddlewareTest
 */
class AuthenticationMiddlewareTest extends TestCase
{
    /**
     * @dataProvider provideUserKeyForRequest
     *
     * @param RequestInterface $request
     * @param string $userKey
     */
    public function testApplyAuthenticationMiddleware(RequestInterface $request, string $userKey)
    {
        $middleware = new AuthenticationMiddleware($userKey);
        $newRequest = $middleware->applyToRequest($request);

        parse_str($newRequest->getUri()->getQuery(), $queryArgs);

        $this->assertStringContainsString($userKey, $newRequest->getUri()->getQuery());
        $this->assertSame($userKey, $queryArgs['user_key']);
    }

    public function provideUserKeyForRequest(): array
    {
        $request = new Request('GET', new Uri());

        return [
            [$request, '4AF70FB6'],
            [$request->withUri($request->getUri()->withQuery('kvkNumber=01000332&mainBranch=true')), 'CC9FA8A9'],
            [$request->withUri($request->getUri()->withQuery('kvkNumber=01000332&user_key=16BA121A0')), '3080162C'],
        ];
    }

    public function testMissingAuthenticationKey()
    {
        $this->expectException(AuthenticationException::class);
        $this->expectErrorMessage('No userKey for authentication given');

        $middleware = new AuthenticationMiddleware('');
        $middleware->applyToRequest(new Request('GET', new Uri()));
    }
}