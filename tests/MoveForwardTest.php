<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\Rover;
use App\Obstacle;
use App\Position;

class MoveForwardTest extends TestCase
{
    public function testMoveForwardaxisY()
    {   
        $rover = new Rover();
        $obstaclesArray = [];
        $rover->moveRoverForward($obstaclesArray);
        $expectedCoordinates = [0,1];
        $this-> assertEquals($expectedCoordinates, $rover->getCoordinates());
    }
    
    public function testMoveForwardAxisX()
    {   
        $rover = new Rover(0,0,"W");
        $obstaclesArray = [];
        $rover->moveRoverForward($obstaclesArray);
        $expectedCoordinates = [-1,0];
        $this-> assertEquals($expectedCoordinates, $rover->getCoordinates());
    }
    
    public function testDetectObstacle()
    {
        $rover = new Rover(0,0,"E");
        $obstacle = new Obstacle([1,0]);
        $obstaclesArray = [$obstacle];
        $roverStartCoordinates = $rover->getCoordinates();
        $roverStartPosition = new Position($roverStartCoordinates[0], $roverStartCoordinates[1]);
       

        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("Obstacle detected at position ". $obstacle->getCoordinates().". Movement stopped. Current position: ".$roverStartPosition->getPosition());
        
        $rover-> moveRoverForward($obstaclesArray);
    }

    public function testStopRoverBeforeOutOfNorthRange()
    {
        $rover = new Rover(0,100,"N");
        $obstaclesArray = [];
        $roverStartCoordinates = $rover->getCoordinates();
        $roverStartPosition = new Position($roverStartCoordinates[0], $roverStartCoordinates[1]);
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the cojntrol from the rover. Your actual Position is: ". $roverStartPosition->getPosition() );
        
        $rover-> moveRoverForward($obstaclesArray);
    }
    
    public function testStopRoverBeforeOutOfSudRange()
    {
        $rover = new Rover(0,-100,"S");
        $obstaclesArray = [];
        $roverStartCoordinates = $rover->getCoordinates();
        $roverStartPosition = new Position($roverStartCoordinates[0], $roverStartCoordinates[1]);
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the cojntrol from the rover. Your actual Position is: ". $roverStartPosition->getPosition());
        
        $rover-> moveRoverForward($obstaclesArray);
    }

    public function testStopRoverBeforeOutOfWestRange()
    {
        $rover = new Rover(-100,0,"W");
        $obstaclesArray= [];
        $roverStartCoordinates = $rover->getCoordinates();
        $roverStartPosition = new Position($roverStartCoordinates[0], $roverStartCoordinates[1]);
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the cojntrol from the rover. Your actual Position is: ". $roverStartPosition->getPosition());
        
        $rover-> moveRoverForward($obstaclesArray);
    }

    public function testStopRoverBeforeOutOfEastRange()
    {
        $rover = new Rover(100,0,"E");
        $obstaclesArray = [];
        $roverStartCoordinates = $rover->getCoordinates();
        $roverStartPosition = new Position($roverStartCoordinates[0], $roverStartCoordinates[1]);
        
        $this-> expectException(Exception::class);
        $this-> expectExceptionMessage("The next step is not possible, if you go away this point you will lose the cojntrol from the rover. Your actual Position is: ". $roverStartPosition->getPosition() );
        
        $rover-> moveRoverForward($obstaclesArray);
    }
}