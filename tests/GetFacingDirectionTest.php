<?php

use PHPUnit\Framework\TestCase;
use App\class\Rover;
use App\class\Direction;

class getFacingDirectionTest extends TestCase
{
    public function testgetFacingDirection()
    {
        $rover = new Rover();
        $expectetDirection = new Direction("N");

        $facingDirection = $rover->getFacingDirection();
        $this-> assertEquals($expectetDirection, $facingDirection);
    }
}