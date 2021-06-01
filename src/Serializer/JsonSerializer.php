<?php

namespace DMT\KvK\Api\Serializer;

use JMS\Serializer\ArrayTransformerInterface;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Metadata\Cache\CacheInterface;

/**
 * Class KvkSerializer
 */
class JsonSerializer implements SerializerInterface, ArrayTransformerInterface
{
    /** @var Serializer $serializer */
    protected $serializer;

    /**
     * SoapSerializer constructor.
     *
     * @param CacheInterface|null $metadataCache
     * @param array|null $metadataDirs
     */
    public function __construct(CacheInterface $metadataCache = null, array $metadataDirs = null)
    {
        $builder = new SerializerBuilder();

        if ($metadataCache) {
            $builder->setMetadataCache($metadataCache);
        }

        if ($metadataDirs) {
            $builder->setMetadataDirs($metadataDirs);
        }

        $this->serializer = $builder
            ->configureListeners(
                function (EventDispatcher $dispatcher) {
                    $dispatcher->addSubscriber(new DateTimeSanitizerEventSubscriber());
                }
            )
            ->addDefaultListeners()
            ->addDefaultSerializationVisitors()
            ->addDefaultDeserializationVisitors()
            ->build();
    }
    /**
     * @inheritDoc
     */
    public function serialize($data, string $format, ?SerializationContext $context = null, ?string $type = null): string
    {
        return $this->serializer->serialize($data, $format, $context, $type);
    }

    /**
     * @inheritDoc
     */
    public function deserialize(string $data, string $type, string $format, ?DeserializationContext $context = null)
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }

    /**
     * @inheritDoc
     */
    public function toArray($data, ?SerializationContext $context = null, ?string $type = null): array
    {
        return $this->serializer->toArray($data, $context, $type);
    }

    /**
     * @inheritDoc
     */
    public function fromArray(array $data, string $type, ?DeserializationContext $context = null)
    {
        return $this->serializer->fromArray($data, $type, $context);
    }
}
