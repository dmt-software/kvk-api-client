<?php

namespace DMT\KvK\Api\Request;

use Psr\Http\Message\RequestInterface;

class UserKeyMiddleware
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
    public function __invoke(RequestInterface $request): RequestInterface
    {
        parse_str($request->getUri()->getQuery(), $query);

        $query['user_key'] = $this->userKey;

        return $request->withUri(
            $request->getUri()->withQuery(
                http_build_query($query, null, '&', PHP_QUERY_RFC3986)
            )
        );
    }
}