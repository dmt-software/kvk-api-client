<?php

namespace DMT\Test\KvK\Api\Request;

use DMT\KvK\Api\Request\UserKeyMiddleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

class UserKeyMiddlewareTest extends TestCase
{
    /**
     * @dataProvider provideUserKeyForRequest
     *
     * @param RequestInterface $request
     * @param string $userKey
     */
    public function testApplyUserKeyMiddleware(RequestInterface $request, string $userKey)
    {
        $middleware = new UserKeyMiddleware($userKey);
        $newRequest = $middleware($request);

        parse_str($newRequest->getUri()->getQuery(), $queryArgs);

        $this->assertContains($userKey, $newRequest->getUri()->getQuery());
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
}