<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Rover;
use App\Obstacle;
use App\Position;

class MoveForwardTest extends TestCase
{
    public function testMoveForward()
    {   
        $rover = new Rover();
        $rover->moveRoverForward();
        $expectedCoordinates = [0,1];
        $this-> assertEquals($expectedCoordinates, $rover->getCoordinates());
    }
    
    public function testDetectObstacle()
    {
        $rover = new Rover(0,0,"E");
        $obstacle = new Obstacle([1,0]);

        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("Obstacle detected at position [1, 0]. Movement stopped. Current position: [0, 0]");
        
        $rover-> moveRoverForward();
    }

    public function testStopRoverBeforeOutOfRange()
    {
        $rover = new Rover(0,99,"N");
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the cojntrol from the rover.");
        
        $rover-> moveRoverForward();
    }
}