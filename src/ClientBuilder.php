<?php

namespace DMT\KvK\Api;

use DMT\CommandBus\Validator\ValidationMiddleware;
use DMT\KvK\Api\Command\GetCompaniesBasicV2;
use DMT\KvK\Api\Handler\GetCompaniesBasicV2Handler;
use DMT\KvK\Api\Request\UserKeyMiddleware;
use Doctrine\Common\Annotations\AnnotationException;
use Doctrine\Common\Annotations\AnnotationRegistry;
use GuzzleHttp\Handler\CurlHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use League\Tactician\CommandBus;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;
use Symfony\Component\Validator\ValidatorBuilder;

/**
 * Class ClientBuilder.
 *
 * This builder helps with configuring a working client if you can't or don't use dependency injection.
 *
 * @package DMT\KvK\Api
 */
class ClientBuilder
{
    /** @static Doctrine Annotation configuration type */
    const TYPE_DEFAULT = 0;

    /** @static Yaml configuration type */
    const TYPE_YAML = 1;

    /** @var string */
    protected $userKey = '';

    /** @var string */
    protected $configurationType = self::TYPE_DEFAULT;

    /**
     * Create this client builder
     *
     * @return ClientBuilder
     */
    public static function create(): self
    {
        return new static();
    }

    /**
     * Set kvk api user key.
     *
     * @param string $userKey
     *
     * @return ClientBuilder
     */
    public function setUserKey(string $userKey): self
    {
        $this->userKey = $userKey;

        return $this;
    }

    /**
     * Set configuration option to use yaml instead of the default.
     *
     * @return ClientBuilder
     */
    public function useYamlConfiguration(): self
    {
        $this->configurationType = self::TYPE_YAML;

        return $this;
    }

    /**
     * Build the client.
     *
     * @return Client
     * @throws AnnotationException
     */
    public function build(): Client
    {
        $client = $this->getHttpClient();
        $serializer = $this->getSerializer();

        return new Client(
            new CommandBus([
                new LockingMiddleware(),
                $this->getValidationMiddleware(),
                new CommandHandlerMiddleware(
                    new ClassNameExtractor(),
                    new InMemoryLocator([
                        GetCompaniesBasicV2::class => new GetCompaniesBasicV2Handler($client, $serializer),
                        // GetCompaniesExtendedV2::class => new GetCompaniesExtendedV2Handler($client, $serializer),
                    ]),
                    new HandleInflector()
                )
            ])
        );
    }

    /**
     * Get configured JMS serializer.
     *
     * @return Serializer
     */
    public function getSerializer(): Serializer
    {
        $builder = new SerializerBuilder();
        if ($this->configurationType === self::TYPE_YAML) {
            $builder->setMetadataDirs([
                'DMT\KvK\Api\Model' => __DIR__ . '/../config/'
            ]);
        } else {
            /** Enable lazy loading annotations */
            AnnotationRegistry::registerUniqueLoader('class_exists');
        }

        $builder->setPropertyNamingStrategy(
            new SerializedNameAnnotationStrategy(
                new IdenticalPropertyNamingStrategy()
            )
        );

        return $builder->build();
    }

    /**
     * Get configured http client.
     *
     * @return \GuzzleHttp\Client
     */
    public function getHttpClient(): \GuzzleHttp\Client
    {
        $stack = new HandlerStack();
        $stack->setHandler(new CurlHandler());
        $stack->push(Middleware::httpErrors());
        $stack->push(
            Middleware::mapRequest(
                new UserKeyMiddleware($this->userKey)
            )
        );

        return new \GuzzleHttp\Client([
            'handler' => $stack
        ]);
    }

    /**
     * Get Validation middleware.
     *
     * @return ValidationMiddleware
     * @throws AnnotationException
     */
    protected function getValidationMiddleware(): ValidationMiddleware
    {
        $validator = null;
        if ($this->configurationType === self::TYPE_YAML) {
            $validator = (new ValidatorBuilder())
                ->addYamlMappings([
                    __DIR__ . '/../config/constraints.yml',
                ])
                ->getValidator();
        }

        return $validationMiddleware = new ValidationMiddleware($validator);
    }
}