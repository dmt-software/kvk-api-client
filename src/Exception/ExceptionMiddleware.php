<?php

namespace DMT\KvK\Api\Exception;

use DMT\CommandBus\Validator\ValidationException;
use GuzzleHttp\Exception\ClientException as HttpClientException;
use JMS\Serializer\Exception\Exception as SerializeException;
use League\Tactician\Middleware;

class ExceptionMiddleware implements Middleware
{
    /**
     * @param object $command
     * @param callable $next
     *
     * @return mixed
     * @throws ExceptionInterface
     */
    public function execute($command, callable $next)
    {
        try {
            return $next($command);
        } catch (ValidationException $exception) {
            $message = 'Invalid command given';

            if ($exception->getViolations()->count() === 1) {
                $message = $exception->getViolations()->get(0)->getMessage();
            }

            throw new CommandException($message, 0, $exception);
        } catch (HttpClientException $exception) {
            if ($exception->hasResponse() && $exception->getResponse()->getStatusCode() === 403) {
                throw new AuthenticationException('Authentication failed', 0, $exception);
            }
            throw new ClientException('Error in service request', 0, $exception);
        } catch (SerializeException $exception) {
            throw new ServerException('Version mismatch, invalid JSON returned', 0, $exception);
        } catch (\Throwable $exception) {
            throw new ServerException('Service unavailable', 0, $exception);
        }
    }
}