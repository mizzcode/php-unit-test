<?php

namespace Mizz\Test;

use PHPUnit\Framework\TestCase;

class MathTest extends TestCase {
    public function testManual() {
        self::assertEquals(2, Math::sum([2]));
        self::assertEquals(40, Math::sum([20, 20]));
        self::assertEquals(2, Math::sum([2]));
        self::assertEquals(2, Math::sum([2]));
        self::assertEquals(2, Math::sum([2]));
    }

    /**
     * @dataProvider mathSumData
     */
    public function testDataProvider(array $values, int $expected ){
        self::assertEquals($expected, Math::sum($values));
    }

    public function mathSumData() {
        return [
            [[5,5], 10],
            [[10,10], 20],
            [[2,2], 4], 
            [[50,50], 100],
            [[], 0]
        ];
    }
}