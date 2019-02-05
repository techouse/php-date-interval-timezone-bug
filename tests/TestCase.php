<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Class TestCase
 *
 * To find a map of timezones visit https://www.timeanddate.com/time/map/
 *
 * @package Tests
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * The Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * @param string $timezone
     */
    protected static function setTimezone(string $timezone = 'UTC'): void
    {
        date_default_timezone_set($timezone);
    }
}