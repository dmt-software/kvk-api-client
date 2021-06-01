<?php

namespace DMT\Test\KvK\Api\Serializer;

use DMT\KvK\Api\Serializer\DateTimeSanitizerEventSubscriber;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\EventDispatcher\PreDeserializeEvent;
use PHPUnit\Framework\TestCase;

/**
 * Class DateTimeSanitizerEventSubscriberTest
 */
class DateTimeSanitizerEventSubscriberTest extends TestCase
{
    /**
     * @dataProvider provideDateTime
     *
     * @param string|null $date
     * @param string $format
     * @param string|null $expected
     */
    public function testSanitizeDate(?string $date, string $format, ?string $expected)
    {
        $event = new PreDeserializeEvent(
            new DeserializationContext(),
            $date,
            ['name' =>'DateTime', 'params' => [$format]]
        );

        $this->assertSame($date, $event->getData());

        $listener = new DateTimeSanitizerEventSubscriber();
        $listener->sanitizeDateTime($event);

        $this->assertSame($expected, $event->getData());
    }

    public function provideDateTime(): iterable
    {
        return [
            'complete date set' => ['20211202', 'Y-m-d', '2021-12-02'],
            'unknown day in date' => ['19971100', 'Y-m-d', '1997-11-01'],
            'unknown month and day in date' => ['16970000', 'Y-m-d', '1697-01-01'],
            'unknown date in register' => ['000000000', 'Y-m-d', null],
            'invalid format' => ['1234567890', 'Y-m-d', null],
            'not set' => [null, 'Y-m-d', null],
        ];
    }
}
