<?php

namespace Unit;

use PHPUnit\Framework\TestCase;

class FirstTaskTest extends TestCase
{

    public function test_an_array_difference_function()
    {
        $this->assertEquals([2], $this->arrayDiff([1,2], [1]), "a was [1,2], b was [1], expected [2]");
        $this->assertEquals([2,2], $this->arrayDiff([1,2,2], [1]), "a was [1,2,2], b was [1], expected[2,2]");
        $this->assertEquals([1], $this->arrayDiff([1,2,2], [2]), "a was [1,2,2], b was [2], expected[1]");
        $this->assertEquals([1, 2, 2], $this->arrayDiff([1, 2, 2], []), "a was [1,2,2], b was [], expected[1,2,2]");
        $this->assertEquals([], $this->arrayDiff([], [1,2]), "a was [], b was [1,2], expected []");
        $this->assertEquals([3], $this->arrayDiff([1, 2, 3], [1,2]), "a was [1, 2, 3], b was [1,2],expected [3]");
    }

    private function arrayDiff(array $original, array $difference): array
    {
        $result = [];

        if (empty($original) || empty($difference)){
            $result = $original;
        }
        else{
            foreach ($original as $originalElement){
               if (!in_array($originalElement , $difference)){
                   $result[] = $originalElement;
               }
            }
        }

        return $result;
    }
}
