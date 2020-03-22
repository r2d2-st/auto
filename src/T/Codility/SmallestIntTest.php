<?php

namespace T\Codility;

use PHPUnit\Framework\TestCase;
/**
 * @group active
 * */
class SmallestIntTest extends TestCase
{
    public function solution($input)
    {
        if (empty($input)) {
            return 1;
        }

        sort($input);

        $lastEl = $input[count($input)-1];

        $match = range(1, $lastEl);

        if ($match == $input) {
            if ($lastEl>0) {
                return $lastEl+1;
            }
        }

        $diff = array_diff($match, $input);

        $diff = array_filter($diff, function($val) {
            return $val>0;
        });

        if (empty($diff)) {
            return 1;
        }

        return min($diff);
    }

    /**
     * @test
     * */
    public function testSolution()
    {
        $this->assertEquals(1, $this->solution([2,5]));
        $this->assertEquals(1, $this->solution([-3,5]));
        $this->assertEquals(1, $this->solution([-3,-2]));
        $this->assertEquals(3, $this->solution([1,2]));
        $this->assertEquals(1, $this->solution([-3,-2,-1,0]));
        $this->assertEquals(1, $this->solution([]));
        $this->assertEquals(5, $this->solution([1, 3, 6, 4, 1, 2]));
        $this->assertEquals(4, $this->solution([1, 2, 3]));
        $this->assertEquals(1, $this->solution([-1, -3]));
        $this->assertEquals(1, 22);
    }
}