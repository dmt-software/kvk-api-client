<?php

namespace DMT\KvK\Api\Http\Middleware;

use DMT\KvK\Api\Exception\AuthorizationException;
use DMT\KvK\Api\Exception\NotFoundException;
use DMT\KvK\Api\Exception\ResponseException;
use DMT\KvK\Api\Exception\UnavailableException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ExceptionMiddleware
 */
class ExceptionMiddleware
{
    /**
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ResponseInterface $response): ResponseInterface
    {
        if ($response->getStatusCode() >= 500) {
            throw new UnavailableException($response->getReasonPhrase());
        }

        if ($response->getStatusCode() === 404) {
            throw new NotFoundException('No results found');
        }

        if ($response->getStatusCode() === 401 || $response->getStatusCode() === 403) {
            throw new AuthorizationException($response->getReasonPhrase());
        }

        if ($response->getStatusCode() >= 400) {
            throw new ResponseException($response->getReasonPhrase());
        }

        return $response;
    }
}
