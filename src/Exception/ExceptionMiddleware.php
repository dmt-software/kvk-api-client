<?php

namespace DMT\KvK\Api\Exception;

use DMT\CommandBus\Validator\ValidationException;
use JMS\Serializer\Exception\Exception as SerializeException;
use League\Tactician\Middleware;
use Psr\Http\Client\ClientExceptionInterface;

/**
 * Class ExceptionMiddleware
 */
class ExceptionMiddleware implements Middleware
{
    /**
     * @param object $command
     * @param callable $next
     *
     * @return mixed
     * @throws Exception
     */
    public function execute($command, callable $next)
    {
        try {
            return $next($command);
        } catch (Exception $exception) {
            throw $exception;
        } catch (ValidationException $exception) {
            throw new RequestException($exception->getMessage(), 0, $exception);
        } catch (ClientExceptionInterface $exception) {
            throw new UnavailableException($exception->getMessage(), 0, $exception);
        } catch (SerializeException $exception) {
            throw new UnavailableException('Version mismatch, invalid JSON returned', 0, $exception);
        }
    }
}
