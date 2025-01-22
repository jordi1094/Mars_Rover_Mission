<?php

use PHPUnit\Framework\TestCase;
use App\Rover;

class GetDirectionTest extends TestCase
{
    public function testGetDirection()
    {
        $rover = new Rover(0,0,"e");
        $direction = $rover->getDirection();
        $this-> assertEquals("E", $direction);
    }
}