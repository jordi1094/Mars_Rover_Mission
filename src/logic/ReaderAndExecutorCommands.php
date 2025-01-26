<?php
declare(strict_types=1);

namespace App\logic;

use App\class\Rover;
use App\class\Map;

class ReaderAndExecutorCommands
{
    public static function readAndExecuteCommands( string $commands, Rover $rover, Map $map):array
    {
        $maxRange = $map->getMaxRange();
        $obstaclesArray = $map->getObstaclesArray();
        $commandArray = str_split($commands);

        foreach($commandArray as $command)
        {
            switch($command){
                case "F":
                    $rover->moveRoverForward($obstaclesArray, $maxRange);
                    break;
                case "L":
                    $rover->rotateDirection($command);
                    break;
                case "R":
                    $rover->rotateDirection($command);
                    break;
                default:
                    echo "The command ". $command. " is not correct. It will be omited.";
            }
        }
        return $rover->getPositionAndDirectionResume();
        }
}