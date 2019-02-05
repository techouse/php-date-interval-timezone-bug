<?php

namespace Tests;

use Faker\Factory;
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

    protected function setUp(): void
    {
        parent::setUp();

        $this->faker = $this->makeFaker();
    }

    /**
     * Create a Faker instance for the given locale.
     *
     * @param  string $locale
     * @return \Faker\Generator
     */
    protected function makeFaker($locale = null): \Faker\Generator
    {
        return Factory::create($locale ?? Factory::DEFAULT_LOCALE);
    }

    /**
     * @param string $timezone
     */
    protected static function setTimezone(string $timezone = 'UTC'): void
    {
        date_default_timezone_set($timezone);
    }
}