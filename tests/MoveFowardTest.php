<?php

use PHPUnit\Framework\TestCase;
use App\Rover;

class MoveFowardTest extends TestCase
{
    public function testMoveFoward()
    {
        $rover = new Rover(0,0,"N");
        $rover-> moveFoward($rover->getDirection());
        $expectedPosition = [0,1];
        $this-> assertEquals($expectedPosition, $rover->getPosition());
    }
    
    public function testDetectObstacle()
    {
        $rover = new Rover(0,0,"E");
        $obstacle = new Obstable(1,0);

        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("Obstacle detected at position [1, 0]. Movement stopped. Current position: [0, 0]");
        
        $rover-> moveFoward($rover->getDirection());
    }

    public function testStopRoverBeforeOutOfRange()
    {
        $rover = new Rover(0,99,"N");
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the cojntrol from the rover.");
        
        $rover-> moveFoward($rover->getDirection());
    }
}