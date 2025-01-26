<?php

namespace App;


require_once __DIR__ . '/../vendor/autoload.php';

use App\logic\ReaderAndExecutorCommands;
use App\class\Rover;
use App\class\Map;
use Exception;

$correctDirections = ["N", "E", "S", "W"];


echo " \n \n \n \n";
$mapsize = readline("Insert map Dimensions:(only numeric value will be accepted)\n");

while (!is_numeric($mapsize)) {
    $mapsize = readline("Insert map Dimensions:(only numeric value will be accepted)\n");
}
$mapsize = intval($mapsize);
$maxTouchDownPoint = $mapsize / 2;
$minTouchDownPoint = -$maxTouchDownPoint;

$startRoverXcoordinate = readline("Insert rover X  touchDown coordinate:");

while (!is_numeric($startRoverXcoordinate) || $startRoverXcoordinate > $maxTouchDownPoint || $startRoverXcoordinate < $minTouchDownPoint) {
    $startRoverXcoordinate = readline("Insert rover X  touchDown coordinate:");
}
$startRoverXcoordinate = intval($startRoverXcoordinate);

$startRoverYcoordinate = readline("Insert rover Y touchDown coordinate:");

while (!is_numeric($startRoverYcoordinate) || $startRoverYcoordinate > $maxTouchDownPoint || $startRoverYcoordinate < $minTouchDownPoint) {
    $startRoverYcoordinate = readline("Insert rover Y touchDown coordinate:");
}
$startRoverYcoordinate = intval($startRoverYcoordinate);

$startRoverFacingDirection = strtoupper(readline(("Insert Rover facing direction:(N/S/E/W)")));
while (!in_array($startRoverFacingDirection, $correctDirections)) {
    $startRoverFacingDirection = strtoupper(readline(("Insert Rover facing direction:(N/S/E/W)")));
}
$rover = new Rover($startRoverXcoordinate, $startRoverYcoordinate, $startRoverFacingDirection);
$map = new Map($mapsize, $rover->getCoordinates());

function extractPositionAndDirection(array $positionAndDirection): array
{
    $position = $positionAndDirection[0]->getPosition();
    $direction = $positionAndDirection[1]->getDirection();

    return [$position, $direction];
}


echo " \n \n \n \n";

echo "Touchdown confirmed, Rover is safely on the surface of Mars \n";

echo "\nRemember: \n \nIn the case of entering an incorrect command in the control chain, the rover will emit it and proceed with the next one. If it encounters any obstacle or reaches the limit of the map, it will stop and inform you of its current position.";

echo "\n \n";

echo "Controls: \nMove Forward: F \nMove Rigth: R \nMove Left: L \nWrite 'Disconect' to disconect the rover \n \n";

$commands = strtoupper(readline("Insert the commands:\n"));


while ($commands !== "DISCONECT") {
    try {

        $finalPositionAndDirection = ReaderAndExecutorCommands::readAndExecuteCommands($commands, $rover, $map);
        [$finalPosition, $finalDirection] = extractPositionAndDirection($finalPositionAndDirection);
        echo "Comads done, the actual position is: \n[" . $finalPosition[0] . "," . $finalPosition[1] . "] " . $finalDirection;
    } catch (Exception $e) {
        echo $e->getMessage();
    } finally {
        $commands = strtoupper(readline("\n \nInsert new commands:\n"));
    }
}

echo "rover disconected.";
