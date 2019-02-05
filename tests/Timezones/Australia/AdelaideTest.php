<?php

namespace Timezones\Australia;

use DateTime;
use Tests\TestCase;

/**
 * Class AdelaideTest
 *
 * DST Ends on Sunday, April 7, 2019 At 3:00:00 AM local daylight time
 * DST Starts on Sunday, October 6, 2019 At 2:00:00 AM local standard time
 *
 * @package Unit\Australia
 */
class AdelaideTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        self::setTimezone('Australia/Adelaide');
    }

    /** @test */
    public function january(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-01-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-02-05 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(4, $differenceDateInterval->d);
    }

    /** @test */
    public function february(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-02-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-03-08 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(7, $differenceDateInterval->d);
    }

    /** @test */
    public function march(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-03-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-04-05 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(4, $differenceDateInterval->d);
    }

    /** @test */
    public function april(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-04-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-05-06 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(5, $differenceDateInterval->d);
    }

    /** @test */
    public function may(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-05-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-06-05 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(4, $differenceDateInterval->d);
    }

    /** @test */
    public function june(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-06-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-07-06 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(5, $differenceDateInterval->d);
    }

    /** @test */
    public function july(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-07-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-08-05 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(4, $differenceDateInterval->d);
    }

    /** @test */
    public function august(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-08-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-09-05 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(4, $differenceDateInterval->d);
    }

    /** @test */
    public function september(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-09-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-10-06 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(5, $differenceDateInterval->d);
    }

    /** @test */
    public function october(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-10-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-11-05 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(4, $differenceDateInterval->d);
    }

    /** @test */
    public function november(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-11-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2019-12-06 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(5, $differenceDateInterval->d);
    }

    /** @test */
    public function december(): void
    {
        $date1 = DateTime::createFromFormat('Y-m-d H:i:s', '2019-12-01 00:00:00');

        $date2 = clone $date1;
        $date2->modify('+5 week');
        $this->assertEquals('2020-01-05 00:00:00', $date2->format('Y-m-d H:i:s'));

        $differenceDateInterval = $date1->diff($date2);
        $this->assertEquals(35, $differenceDateInterval->days);
        $this->assertEquals(1, $differenceDateInterval->m);
        $this->assertEquals(4, $differenceDateInterval->d);
    }
}