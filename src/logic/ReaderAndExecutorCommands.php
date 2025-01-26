<?php

declare(strict_types=1);

namespace App\logic;

use App\models\Rover;
use App\models\Map;

class ReaderAndExecutorCommands
{
    /**
     * Reads and executes a series of commands for the rover.
     * This function takes a string of commands, splits it into individual
     * commands, and processes each one by either moving the rover forward
     * or rotating its direction based on the command received.
     *
     * @param string $commands The string of commands to be executed (e.g., "F", "L", "R").
     * @param Rover $rover The rover object that will be moved or rotated.
     * @param Map $map The map that contains information like obstacles or boundaries.
     * @return array The rover's position and direction after executing all commands.
     */

    public static function readAndExecuteCommands(string $commands, Rover $rover, Map $map): array
    {
        $commandArray = str_split($commands);

        foreach ($commandArray as $command) {
            switch ($command) {
                case "F":
                    $rover->moveRoverForward($map);
                    break;
                case "L":
                case "R":
                    $rover->rotateDirection($command);
                    break;
                default:
                    echo "The command " . $command . " is not correct. It will be omited.";
            }
        }
        return $rover->getPositionAndDirectionResume();
    }
}
