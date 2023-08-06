<?php

namespace Mizz\Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

class CounterTest extends TestCase {

    private Counter $counter;

    protected function setUp(): void
    {
        $this->counter = new Counter();
        echo "Membuat SetUp Object Counter" . PHP_EOL;
    }

    public function testIncrement() {
        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());
        self::markTestIncomplete('belum selesai');
    }

    public function testCounter() {

        $this->counter->increment();
        Assert::assertEquals(1, $this->counter->getCounter());

        $this->counter->increment();
        $this->assertEquals(2, $this->counter->getCounter());

        $this->counter->increment();
        self::assertEquals(3, $this->counter->getCounter());
    }

    /** jika tidak pakai test di depan nama method nya maka tidak dianggap sebagai unit test tapi bisa kita akalin/solusinya menggunakan annotation @test
     * @test
     */
    public function increment() {
        self::markTestSkipped('masih ada bug');

        $this->counter->increment();
        self::assertEquals(1, $this->counter->getCounter());
    }

    public function testFirst():Counter {
        $this->counter->increment();
        self::assertEquals(1, $this->counter->getCounter());

        return $this->counter;
    }

    /**
     * @depends testFirst
     */
    public function testSecond(Counter $counter):void {
        $this->counter->increment();
        self::assertEquals(1, $this->counter->getCounter());
    }

    public function tearDown():void {
        echo "Tear Down di eksekusi ketika setiap unit test selesai" . PHP_EOL;
    }

    /**
     * @after
     * selain pakai tearDown juga bisa pake annotation after untuk dijalankan ketika sebuah unit test selesai dieksekusi
     */
    public function afterUnitTest() {
        echo "setelah unit test selesai maka ini dijalankan" . PHP_EOL;
    }

    /**
     * @requires PHP >= 8
     * @requires OSFAMILY Windows
     */
    public function testOnlyWindows() {
        self::assertTrue(true, 'Work on Windows');
    }
}