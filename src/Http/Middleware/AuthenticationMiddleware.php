<?php

namespace DMT\KvK\Api\Http\Middleware;

use DMT\KvK\Api\Exception\AuthenticationException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AuthenticationMiddleware
 */
class AuthenticationMiddleware
{
    /** @var string */
    protected $userKey;

    /**
     * UserKeyMiddleware constructor.
     *
     * @param string $userKey
     */
    public function __construct(string $userKey)
    {
        $this->userKey = $userKey;
    }

    /**
     * Apply this middleware to the request
     *
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function applyToRequest(RequestInterface $request): RequestInterface
    {
        if (empty($this->userKey)) {
            throw new AuthenticationException('No userKey for authentication given');
        }

        parse_str($request->getUri()->getQuery(), $query);

        $query['user_key'] = $this->userKey;

        return $request->withUri(
            $request->getUri()->withQuery(
                http_build_query($query, null, '&', PHP_QUERY_RFC3986)
            )
        );
    }

    /**
     * Check the response for authentication errors.
     *
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function checkResponse(ResponseInterface $response): ResponseInterface
    {
        if ($response->getStatusCode() === 403) {
            throw new AuthenticationException('Authentication failed');
        }

        return $response;
    }
}