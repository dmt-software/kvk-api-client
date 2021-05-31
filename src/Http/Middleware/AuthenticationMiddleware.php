<?php

namespace DMT\KvK\Api\Http\Middleware;

use DMT\KvK\Api\Exception\AuthorizationException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class AuthenticationMiddleware
 */
class AuthenticationMiddleware
{
    public const AUTH_HEADER = 'header';
    public const AUTH_QEURYSTRING = 'query';

    /** @var string $userKey */
    protected $userKey;

    /** @var string $type */
    protected $type;

    /**
     * UserKeyMiddleware constructor.
     *
     * @param string $userKey
     * @param string $type
     */
    public function __construct(string $userKey, string $type = self::AUTH_HEADER)
    {
        $this->userKey = $userKey;
        $this->type = $type;
    }

    /**
     * Apply this middleware to the request
     *
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function __invoke(RequestInterface $request): RequestInterface
    {
        if (empty($this->userKey)) {
            throw new AuthorizationException('No apiKey for authorization given');
        }

        if ($this->type === self::AUTH_QEURYSTRING) {
            parse_str($request->getUri()->getQuery(), $query);

            $query['user_key'] = $this->userKey;

            return $request->withUri(
                $request->getUri()->withQuery(
                    http_build_query($query, null, '&', PHP_QUERY_RFC3986)
                )
            );
        }

        return $request->withHeader('apikey', $this->userKey);
    }
}