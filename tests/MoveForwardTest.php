<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\class\Rover;
use App\class\Obstacle;
use App\class\Position;

class MoveForwardTest extends TestCase
{
    public function testMoveForwardaxisY()
    {   
        $rover = new Rover();
        $obstaclesArray = [];
        $maxRange = 100;
        $rover->moveRoverForward($obstaclesArray, $maxRange);
        $expectedCoordinates = [0,1];
        $this-> assertEquals($expectedCoordinates, $rover->getCoordinates());
    }
    
    public function testMoveForwardAxisX()
    {   
        $rover = new Rover(0,0,"W");
        $obstaclesArray = [];
        $maxRange = 200;
        $rover->moveRoverForward($obstaclesArray, $maxRange);
        $expectedCoordinates = [-1,0];
        $this-> assertEquals($expectedCoordinates, $rover->getCoordinates());
    }
    
    public function testDetectObstacle()
    {
        $rover = new Rover(0,0,"E");
        $obstacle = new Obstacle([1,0]);
        $obstaclesArray = [$obstacle];
        $maxRange = 50;
        $expectedObstacleCoordinates = $obstacle->getCoordinates();
        $roverStartCoordinates = $rover->getCoordinates();
        $expectedDirection = $rover->getFacingDirection();
       

        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("Obstacle detected at position [" . $expectedObstacleCoordinates[0] . "," . $expectedObstacleCoordinates[1] . 
                "]. Movement stopped. Current position: [" . $roverStartCoordinates[0] . "," . 
                $roverStartCoordinates[1] . "] " . $expectedDirection->getDirection());
        
        $rover-> moveRoverForward($obstaclesArray, $maxRange);
    }

    public function testStopRoverBeforeOutOfNorthRange()
    {
        $rover = new Rover(0,100,"N");
        $obstaclesArray = [];
        $maxRange = 100;
        $roverExpectedCoordinates = $rover->getCoordinates();
        $roverExpectedPosition = new Position($roverExpectedCoordinates[0], $roverExpectedCoordinates[1]);
        $roverExpectedDirection = $rover->getFacingDirection();
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [". $roverExpectedPosition->getPosition()[0].",".$roverExpectedPosition->getPosition()[1]. "] ". $roverExpectedDirection->getDirection());
        
        $rover-> moveRoverForward($obstaclesArray, $maxRange);
    }

    public function testStopRoverBeforeOutOfSudRange()
    {
        $rover = new Rover(0,-100,"S");
        $obstaclesArray = [];
        $maxRange = 100;
        $roverExpectedCoordinates = $rover->getCoordinates();
        $roverExpectedPosition = new Position($roverExpectedCoordinates[0], $roverExpectedCoordinates[1]);
        $roverExpectedDirection = $rover->getFacingDirection();
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [". $roverExpectedPosition->getPosition()[0].",".$roverExpectedPosition->getPosition()[1]. "] ". $roverExpectedDirection->getDirection());
        
        $rover-> moveRoverForward($obstaclesArray, $maxRange);
    }

    public function testStopRoverBeforeOutOfEastRange()
    {
        $rover = new Rover(100,0,"E");
        $obstaclesArray = [];
        $maxRange = 100;
        $roverExpectedCoordinates = $rover->getCoordinates();
        $roverExpectedPosition = new Position($roverExpectedCoordinates[0], $roverExpectedCoordinates[1]);
        $roverExpectedDirection = $rover->getFacingDirection();
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [". $roverExpectedPosition->getPosition()[0].",".$roverExpectedPosition->getPosition()[1]. "] ". $roverExpectedDirection->getDirection());
        
        $rover-> moveRoverForward($obstaclesArray, $maxRange);
    }

    public function testStopRoverBeforeOutOfWestRange()
    {
        $rover = new Rover(-100,0,"W");
        $obstaclesArray = [];
        $maxRange = 100;
        $roverExpectedCoordinates = $rover->getCoordinates();
        $roverExpectedPosition = new Position($roverExpectedCoordinates[0], $roverExpectedCoordinates[1]);
        $roverExpectedDirection = $rover->getFacingDirection();
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [". $roverExpectedPosition->getPosition()[0].",".$roverExpectedPosition->getPosition()[1]. "] ". $roverExpectedDirection->getDirection());
        
        $rover-> moveRoverForward($obstaclesArray, $maxRange);
    }
}