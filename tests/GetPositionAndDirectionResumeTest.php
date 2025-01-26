<?php

use PHPUnit\Framework\TestCase;
use App\models\Direction;
use App\models\Position;
use App\models\Rover;

class GetPositionAndDirectionResumeTest extends TestCase
{
    public function testGetPositionAndDirection()
    {
        $rover = new Rover(5, 5, "E");
        $expectecPosition = new Position(5, 5);
        $expectedDirection = new Direction("E");
        $positionAndDirectionResume = $rover->getPositionAndDirectionResume();
        $this->assertEquals([$expectecPosition, $expectedDirection], $positionAndDirectionResume);
    }
}
