<?php

use PHPUnit\Framework\TestCase;
use App\Rover;

class RotateDirection extends TestCase
{
    public function testRotateDirectionLeft()
    {
        $rotationInput = "L";
        $rover = new Rover();
        $expectecDirection = "W";
        $rover-> rotateDirection($rotationInput);
        $this-> assertEquals($expectecDirection, $rover->getDirection());
    }
    public function testRotateDirectionRigth()
    {
        $rotationInput = "R";
        $rover = new Rover(0,0,"N");
        $expectecDirection = "E";
        $rover-> rotateDirection($rotationInput);
        $this-> assertEquals("W", $rover->getDirection());
    }
}