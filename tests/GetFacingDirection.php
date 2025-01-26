<?php

use PHPUnit\Framework\TestCase;
use App\class\Rover;

class getFacingDirectionTest extends TestCase
{
    public function testGetDirection()
    {
        $rover = new Rover();
        $direction = $rover->getFacingDirection();
        $this->assertEquals("N", $direction);
    }
}
