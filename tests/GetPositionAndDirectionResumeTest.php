<?php

use App\Direction;
use App\Position;
use PHPUnit\Framework\TestCase;
use App\Rover;

class GetPositionAndDirectionResumeTest extends TestCase
{
    public function testGetPositionAndDirection()
    {
        $rover = new Rover(5,5,"E");
        $expectecPosition = new Position(5,5);
        $expectedDirection = new Direction("E");
        $positionAndDirectionResume = $rover->getPositionAndDirectionResume();
        $this->assertEquals([$expectecPosition, $expectedDirection], $positionAndDirectionResume);
    }
}