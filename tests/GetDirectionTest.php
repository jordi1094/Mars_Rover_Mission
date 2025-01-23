<?php

use PHPUnit\Framework\TestCase;
use App\Rover;

class GetDirectionTest extends TestCase
{
    public function testGetDirection()
    {
        $rover = new Rover();
        $direction = $rover->getDirection();
        $this-> assertEquals("N", $direction);
    }
}