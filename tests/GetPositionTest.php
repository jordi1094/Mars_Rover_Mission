<?php

use PHPUnit\Framework\TestCase;
use App\Rover;

class GetPositionTest extends TestCase
{
    public function testGetPosition()
    {
        $rover = new Rover();
        $position = $rover->getPosition();
        $this->assertEquals([0,0], $position);
    }
}