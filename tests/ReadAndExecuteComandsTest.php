<?php
declare(strict_types=1);

use App\Direction;
use App\Position;
use App\Rover;
use App\ReaderAndExecutorCommands;
use PHPUnit\Framework\TestCase;

class ReadAndExecuteComandsTest extends TestCase
{
   public function testReadAndExecuteCommands()
   {
       $rover = new Rover();
       $commands = "FFRFRFFFR";
       $obstaclesArray = [];
       $expectedPosition = new Position(1,-1);
       $expectedFacingDirection = new Direction("W");

       ReaderAndExecutorCommands::readAndExecuteCommands($commands, $rover, $obstaclesArray);

       $this->assertEquals($rover->getCoordinates(), $expectedPosition->getPosition());
       $this->assertEquals($rover->getFacingDirection(), $expectedFacingDirection);

   } 
   
   public function testReadAndExecuteCommandsOneIncorrect()
   {
       $rover = new Rover();
       $commands = "FFLFLFFFFJ";
       $obstaclesArray = [];
       $expectedPosition = new Position(-1,-2);
       $expectedFacingDirection = new Direction("S");

       ReaderAndExecutorCommands::readAndExecuteCommands($commands, $rover, $obstaclesArray);

       $this->assertEquals($rover->getCoordinates(), $expectedPosition->getPosition());
       $this->assertEquals($rover->getFacingDirection(), $expectedFacingDirection);

   } 
}