<?php

namespace DMT\KvK\Api;

use DMT\CommandBus\Validator\ValidationMiddleware;
use DMT\KvK\Api\Http\Middleware\ExceptionMiddleware;
use DMT\KvK\Api\Http\Request\RequestInterface;
use DMT\KvK\Api\Http\Request\GetCompaniesBasicV2;
use DMT\KvK\Api\Http\GetCompaniesBasicV2Handler;
use DMT\KvK\Api\Http\HandlerInterface;
use DMT\KvK\Api\Http\Middleware\AuthenticationMiddleware;
use DMT\KvK\Api\Http\Response\CompanyBasicV2ResultData;
use DMT\KvK\Api\Http\Response\ResultData;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use JMS\Serializer\SerializerInterface;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\CallableLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;

/**
 * Class Client
 */
class Client
{
    /** @var Config $config */
    protected $config;

    /** @var SerializerInterface|null $serializer */
    protected $serializer;

    /** @var CommandBus */
    protected $commandBus;

    /**
     * Client constructor.
     *
     * @param Config $config
     * @param SerializerInterface|null $serializer
     */
    public function __construct(Config $config, SerializerInterface $serializer = null)
    {
        $this->config = $config;
        $this->serializer = $serializer ?? (new \JMS\Serializer\SerializerBuilder())->build();

        $this->commandBus = new CommandBus([
            new LockingMiddleware(),
            new ValidationMiddleware(),
            new CommandHandlerMiddleware(
                new ClassNameExtractor(),
                new CallableLocator([$this, 'getHandler']),
                new HandleInflector()
            )
        ]);
    }

    /**
     * Lookup Companies
     *
     * @param string|null $kvkNumber
     * @param string|null $branchNumber
     * @param string|null $rsin
     * @param string|null $street
     * @param string|null $houseNumber
     * @param string|null $postalCode
     * @param string|null $city
     * @param string|null $tradeName
     * @param bool|null $includeFormerTradeNames
     * @param bool|null $includeInactiveRegistrations
     * @param bool|null $mainBranch
     * @param bool|null $branch
     * @param bool|null $legalPerson
     * @param int|null $startPage
     * @param string|null $site
     * @param string|null $context
     * @param string|null $q
     *
     * @return CompanyBasicV2ResultData
     */
    public function getCompaniesBasicV2(
        string $kvkNumber = null,
        string $branchNumber = null,
        string $rsin = null,
        string $street = null,
        string $houseNumber = null,
        string $postalCode = null,
        string $city = null,
        string $tradeName = null,
        bool $includeFormerTradeNames = null,
        bool $includeInactiveRegistrations = null,
        bool $mainBranch = null,
        bool $branch = null,
        bool $legalPerson = null,
        int $startPage = null,
        string $site = null,
        string $context = null,
        string $q = null
    ): CompanyBasicV2ResultData {
        $command = new GetCompaniesBasicV2();
        $command->kvkNumber = $kvkNumber;
        $command->branchNumber = $branchNumber;
        $command->rsin = $rsin;
        $command->street = $street;
        $command->houseNumber = $houseNumber;
        $command->postalCode = $postalCode;
        $command->city = $city;
        $command->tradeName = $tradeName;
        $command->includeFormerTradeNames = $includeFormerTradeNames;
        $command->includeInactiveRegistrations = $includeInactiveRegistrations;
        $command->mainBranch = $mainBranch;
        $command->branch = $branch;
        $command->legalPerson = $legalPerson;
        $command->startPage = $startPage;
        $command->site = $site;
        $command->context = $context;
        $command->q = $q;

        return $this->process($command);
    }

    /**
     * Execute the command
     *
     * @param RequestInterface $command
     * @return ResultData
     */
    public function process(RequestInterface $command): ResultData
    {
        return $this->commandBus->handle($command);
    }

    /**
     * Get the command handler.
     *
     * @param string $command
     *
     * @return HandlerInterface
     */
    public function getHandler(string $command): HandlerInterface
    {
        $stack = HandlerStack::create(new CurlHandler());
        $stack->push(Middleware::mapRequest(new AuthenticationMiddleware($this->config->userKey)));
        $stack->push(Middleware::mapResponse(new ExceptionMiddleware()));

        $client = new HttpClient([
            'base_uri' => $this->config->baseUri,
            'handler' => $stack
        ]);

        if ($command === GetCompaniesBasicV2::class) {
            return new GetCompaniesBasicV2Handler($client, $this->serializer);
        }

        throw new \InvalidArgumentException('Illegal command given');
    }
}