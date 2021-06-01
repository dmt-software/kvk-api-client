<?php

namespace DMT\KvK\Api\Serializer;

use JMS\Serializer\EventDispatcher\EventSubscriberInterface;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use JMS\Serializer\Exception\RuntimeException;

/**
 * Class DateTimeSanitizerEventSubscriber
 */
class DateTimeSanitizerEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            [
                'event' => 'serializer.pre_deserialize',
                'method' => 'sanitizeDateTime',
                'format' => 'json',
            ]
        ];
    }

    /**
     * Fix the datetime format, before it is deserialized.
     *
     * @param PreDeserializeEvent $event
     * @throws RuntimeException
     */
    public function sanitizeDateTime(PreDeserializeEvent $event)
    {
        if ($event->getType()['name'] !== 'DateTime' || empty($event->getData())) {
            return;
        }

        if ($event->getData() === '00000000' || !preg_match('~^\d{8}$~', $event->getData())) {
            $event->setData(null);
            return;
        }

        $dateString = preg_replace('~(\d{4})(\d{2})(\d{2})~', '$1-$2-$3', $event->getData());

        $event->setData(preg_replace('~(?<=\-)00~', '01', $dateString));
    }
}
