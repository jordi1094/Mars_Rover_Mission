<?php

use PHPUnit\Framework\TestCase;
use App\Rover;
use App\Direction;

class RotateDirectionTest extends TestCase
{
    public function testRotateDirectionLeft()
    {
        $rotateInput = "L";
        $rover = new Rover(0,0, "E");
        $expectecDirection = new Direction("N");
        $rover-> rotateDirection($rotateInput, $rover->getFacingDirection() );
        $this-> assertEquals($expectecDirection, $rover->getFacingDirection());
    }
    public function testRotateDirectionRigth()
    {
        $rotateInput = "R";
        $rover = new Rover(0,0,"N");
        $expectecDirection = new Direction("E");
        $rover->rotateDirection($rotateInput, $rover->getFacingDirection());
        $this->assertEquals($expectecDirection, $rover->getFacingDirection());
    }

    public function testRotateDirectionLeftFromNorth()
    {
        $rotateInput = "L";
        $rover = new Rover(0,0,"N");
        $expectecDirection = new Direction("W");
        $rover->rotateDirection($rotateInput,  $rover->getFacingDirection());
        $this-> assertEquals($expectecDirection, $rover->getFacingDirection());
    }

    public function testRotateDirectionRigthFromWest()
    {
        $rotateInput = "R";
        $rover = new Rover(0,0,"W");
        $expectecDirection = new Direction("N");
        $rover->rotateDirection($rotateInput,  $rover->getFacingDirection());
        $this-> assertEquals($expectecDirection, $rover->getFacingDirection());
    }
}