<?php

use Mizz\Test\Counter;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class CounterStaticTest extends TestCase {
    private static Counter $counter;

    // bisa juga setUp menggunakan annotation beforeClass
    public static function setUpBeforeClass(): void
    {
        self::$counter = new Counter();
        echo "SetUp Before Class di eksekusi sebelum unit test";
    }

    public function testIncrement() {
        self::$counter->increment();
        self::assertEquals(1, self::$counter->getCounter());
    }

    public function testSecondIncrement() {
        self::$counter->increment();
        self::assertEquals(2, self::$counter->getCounter());
    }

    public static function tearDownAfterClass(): void
    {
        echo "tearDown After Class di eksekusi setelah unit test selesai";   
    }
}