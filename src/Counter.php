<?php

namespace Mizz\Test;

class Counter {
    private int $counter = 0;

    public function increment():void {
        $this->counter++;
    }

    public function getCounter():int {
        return $this->counter;
    }
}