<?php
declare(strict_types=1);

namespace App;

use App\Rover;

class ReaderAndExecutorCommands
{
    public static function readAndExecuteCommands( string $commands, Rover $rover, Array $obstaclesArray)
    {
        $commandArray = str_split($commands);

        foreach($commandArray as $command)
        {
            switch($command){
                case "F":
                    $rover->moveRoverForward($obstaclesArray);
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
    }
}