<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\class\Direction;
use App\class\Map;
use App\class\Position;
use App\class\Rover;
use App\logic\ReaderAndExecutorCommands;

class ReadAndExecuteComandsTest extends TestCase
{
    public function testReadAndExecuteCommands()
    {
        $rover = new Rover();
        $commands = "FFRFRFFFR";
        $map = new Map(200, $rover->getCoordinates(), 0);
        $expectedPosition = new Position(1, -1);
        $expectedFacingDirection = new Direction("W");

        ReaderAndExecutorCommands::readAndExecuteCommands($commands, $rover, $map);

        $this->assertEquals($rover->getCoordinates(), $expectedPosition->getPosition());
        $this->assertEquals($rover->getFacingDirection(), $expectedFacingDirection);
    }

    public function testReadAndExecuteCommandsOneIncorrect()
    {
        $rover = new Rover();
        $commands = "FFLFLFFFFJ";
        $map = new Map(4, $rover->getCoordinates(), 0);
        $expectedPosition = new Position(-1, -2);
        $expectedFacingDirection = new Direction("S");

        ReaderAndExecutorCommands::readAndExecuteCommands($commands, $rover, $map);

        $this->assertEquals($rover->getCoordinates(), $expectedPosition->getPosition());
        $this->assertEquals($rover->getFacingDirection(), $expectedFacingDirection);
    }
}
