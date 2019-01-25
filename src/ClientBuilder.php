<?php

namespace DMT\KvK\Api;

use DMT\CommandBus\Validator\ValidationMiddleware;
use DMT\KvK\Api\Command\GetCompaniesBasicV2;
use DMT\KvK\Api\Handler\GetCompaniesBasicV2Handler;
use DMT\KvK\Api\Request\UserKeyMiddleware;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;
use Symfony\Component\Validator\ValidatorBuilder;

class ClientBuilder
{
    /** @var string */
    protected $userKey = '';

    public static function create()
    {
        return new static();
    }

    public function build(): Client
    {
        $validationMiddleware = new ValidationMiddleware(
            (new ValidatorBuilder())
                ->addYamlMappings([
                    __DIR__ . '/../config/constraints.yml',
                ])
                ->getValidator()
        );

        $client = $this->getHttpClient();
        $serializer = $this->getSerializer();
        $commandHandlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            new InMemoryLocator([
                GetCompaniesBasicV2::class => new GetCompaniesBasicV2Handler($client, $serializer),
            ]),
            new HandleInflector()
        );

        return new Client(
            new CommandBus([
                new LockingMiddleware(),
                $validationMiddleware,
                $commandHandlerMiddleware
            ])
        );
    }

    public function getSerializer(): Serializer
    {
        return SerializerBuilder::create()
            ->setMetadataDirs([__DIR__ . '/Model/'])
            ->setPropertyNamingStrategy(
                new IdenticalPropertyNamingStrategy()
            )
            ->build();
    }

    public function getHttpClient(): \GuzzleHttp\Client
    {
        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());
        $stack->push(
            Middleware::mapRequest(
                new UserKeyMiddleware($this->userKey)
            )
        );

        return new \GuzzleHttp\Client([
            'handler' => $stack
        ]);
    }
}