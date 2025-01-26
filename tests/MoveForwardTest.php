<?php

declare(strict_types=1);

use App\models\Map;
use PHPUnit\Framework\TestCase;
use App\models\Rover;
use App\models\Obstacle;
use App\models\Position;

class MoveForwardTest extends TestCase
{
    public function testMoveForwardaxisY()
    {
        $rover = new Rover();
        $map = new Map(100, $rover->getCoordinates(), 0);
        $rover->moveRoverForward($map);
        $expectedCoordinates = [0, 1];
        $this->assertEquals($expectedCoordinates, $rover->getCoordinates());
    }

    public function testMoveForwardAxisX()
    {
        $rover = new Rover(0, 0, "W");
        $map = new Map(100, $rover->getCoordinates(), 0);
        $rover->moveRoverForward($map);
        $expectedCoordinates = [-1, 0];
        $this->assertEquals($expectedCoordinates, $rover->getCoordinates());
    }

    public function testDetectObstacle()
    {
        $rover = new Rover(0, 0, "E");
        $obstacle = new Obstacle([1, 0]);
        $obstaclesArray = [$obstacle];
        $map = new Map(100, $rover->getCoordinates(),1);
        $map->setObstaclesArray($obstaclesArray);
        $expectedObstacleCoordinates = $obstacle->getCoordinates();
        $roverStartCoordinates = $rover->getCoordinates();
        $expectedDirection = $rover->getFacingDirection();


        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Obstacle detected at position [" . $expectedObstacleCoordinates[0] . "," . $expectedObstacleCoordinates[1] .
            "]. Movement stopped. Current position: [" . $roverStartCoordinates[0] . "," .
            $roverStartCoordinates[1] . "] " . $expectedDirection->getDirection());

        $rover->moveRoverForward($map);
    }

    public function testStopRoverBeforeOutOfNorthRange()
    {
        $rover = new Rover(0, 100, "N");
        $map = new Map(200, $rover->getCoordinates(), 0);
        $roverExpectedCoordinates = $rover->getCoordinates();
        $roverExpectedPosition = new Position($roverExpectedCoordinates[0], $roverExpectedCoordinates[1]);
        $roverExpectedDirection = $rover->getFacingDirection();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [" . $roverExpectedPosition->getPosition()[0] . "," . $roverExpectedPosition->getPosition()[1] . "] " . $roverExpectedDirection->getDirection());

        $rover->moveRoverForward($map);
    }

    public function testStopRoverBeforeOutOfSudRange()
    {
        $rover = new Rover(0, -100, "S");
        $map = new Map(200, $rover->getCoordinates(), 0);
        $roverExpectedCoordinates = $rover->getCoordinates();
        $roverExpectedPosition = new Position($roverExpectedCoordinates[0], $roverExpectedCoordinates[1]);
        $roverExpectedDirection = $rover->getFacingDirection();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [" . $roverExpectedPosition->getPosition()[0] . "," . $roverExpectedPosition->getPosition()[1] . "] " . $roverExpectedDirection->getDirection());

        $rover->moveRoverForward($map);
    }

    public function testStopRoverBeforeOutOfEastRange()
    {
        $rover = new Rover(100, 0, "E");
        $map = new Map(200, $rover->getCoordinates(), 0);
        $roverExpectedCoordinates = $rover->getCoordinates();
        $roverExpectedPosition = new Position($roverExpectedCoordinates[0], $roverExpectedCoordinates[1]);
        $roverExpectedDirection = $rover->getFacingDirection();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [" . $roverExpectedPosition->getPosition()[0] . "," . $roverExpectedPosition->getPosition()[1] . "] " . $roverExpectedDirection->getDirection());

        $rover->moveRoverForward($map);
    }

    public function testStopRoverBeforeOutOfWestRange()
    {
        $rover = new Rover(-100, 0, "W");
        $map = new Map(200, $rover->getCoordinates(), 0);
        $roverExpectedCoordinates = $rover->getCoordinates();
        $roverExpectedPosition = new Position($roverExpectedCoordinates[0], $roverExpectedCoordinates[1]);
        $roverExpectedDirection = $rover->getFacingDirection();

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [" . $roverExpectedPosition->getPosition()[0] . "," . $roverExpectedPosition->getPosition()[1] . "] " . $roverExpectedDirection->getDirection());

        $rover->moveRoverForward($map);
    }
}
