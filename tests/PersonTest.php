<?php

namespace Mizz\Test;

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase {

    private Person $person;

    protected function setUp():void {
        $this->person = new Person('Mizz');
    }

    public function testSucces() {
        self::assertEquals('Hello Eko! My name is Mizz' . PHP_EOL, $this->person->sayHello("Eko"));
    }

    public function testException() {
        $this->expectException(\Exception::class);
        $this->person->sayHello(null);
    }

    public function testGoodbye() {
        $this->person->goodBye('Jani');
        $this->expectOutputString('Good bye Jani' . PHP_EOL);
    }
}