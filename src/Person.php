<?php

namespace Mizz\Test;

use Exception;

class Person {
    public function __construct(private string $name)
    {
        
    }

    public function sayHello(?string $name) {
        if ($name == null) throw new Exception('Error: Name is null');
        return "Hello $name! My name is $this->name" . PHP_EOL;
    }

    public function goodBye(?string $name) {
        echo "Good bye $name" . PHP_EOL;
    }
}