<?php

namespace Mizz\Test;

class Example {
    public function __construct(private string $name)
    {
        
    }

    public function sayHello(string $name) {
        echo "Halo $name! My name is $this->name";
    }
}