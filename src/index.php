<?php

namespace App;


require_once __DIR__ . '/../vendor/autoload.php';

use App\logic\ReaderAndExecutorCommands;
use App\models\Rover;
use App\models\Map;
use App\logic\Rotator;
use Exception;

const MAX_SIZE_MAP = 1000000;

function requestNumberBetweenBounds(string $message, int $maxNumber, int $minNumber): int
{
    $requestedNumber = readline($message);
    while (!is_numeric($requestedNumber) || $requestedNumber > $maxNumber || $requestedNumber < $minNumber) {
        echo "ERROR: \nThe number must be between " . $minNumber . " and " . $maxNumber . ".\n";
        $requestedNumber = readline($message);
    }
    return intval($requestedNumber);
}

echo " \n \n \n \n";

$mapsize = requestNumberBetweenBounds("Insert map Dimensions:(only numeric value will be accepted)\n", MAX_SIZE_MAP, 0);

$maxTouchDownPoint = $mapsize / 2;
$minTouchDownPoint = -$maxTouchDownPoint;

$startRoverXcoordinate = requestNumberBetweenBounds("Insert rover X  touchDown coordinate:\n", $maxTouchDownPoint, $minTouchDownPoint);
$startRoverYcoordinate = requestNumberBetweenBounds("Insert rover Y touchDown coordinate:\n", $maxTouchDownPoint, $minTouchDownPoint);

$startRoverFacingDirection = strtoupper(readline(("Insert Rover facing direction:(N/S/E/W)\n")));
while (!in_array($startRoverFacingDirection, Rotator::ORDER_DIRECTION)) {
    $startRoverFacingDirection = strtoupper(readline(("Insert Rover facing direction:(N/S/E/W)\n")));
}
$rover = new Rover($startRoverXcoordinate, $startRoverYcoordinate, $startRoverFacingDirection);
$map = new Map($mapsize, $rover->getCoordinates());

function extractPositionAndDirection(array $positionAndDirection): array
{
    $position = $positionAndDirection[0];
    $direction = $positionAndDirection[1]->getDirection();

    return [$position, $direction];
}


echo " \n \n \n \n";

echo "Touchdown confirmed, Rover is safely on the surface of Mars \n";

echo "\nRemember: \n \nIn the case of entering an incorrect command in the control chain, the rover will emit it and proceed with the next one. If it encounters any obstacle or reaches the limit of the map, it will stop and inform you of its current position.";

echo "\n \n";

echo "Controls: \nMove Forward: F \nMove Rigth: R \nMove Left: L \nWrite 'Disconnect' to disconect the rover \n \n";

$commands = strtoupper(readline("Insert the commands:\n"));


while ($commands !== "DISCONNECT") {
    try {

        $finalPositionAndDirection = ReaderAndExecutorCommands::readAndExecuteCommands($commands, $rover, $map);
        [$finalPosition, $finalDirection] = extractPositionAndDirection($finalPositionAndDirection);
        echo "Comads done, the actual position is: \n" . $finalPosition . " " . $finalDirection;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $commands = strtoupper(readline("\n \nInsert new commands:\n"));
    }
}

echo "rover disconnected.";
