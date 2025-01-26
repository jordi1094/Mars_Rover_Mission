<?php

namespace App;


require_once __DIR__ . '/../vendor/autoload.php';

use App\ReaderAndExecutorCommands;
use App\ObstacleRandomCreator;
use App\Rover;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

$mapSice = 200;
$medianInteractionBetweenObstacles = 60;
$obstacleQuantity = ($mapSice * $mapSice)*(1/$medianInteractionBetweenObstacles);
$rover = new Rover();
$obstacleArray = ObstacleRandomCreator::createRandomObstacleList($rover->getCoordinates(), $obstacleQuantity);

function extractPositionAndDirection(array $positionAndDirection):array
{
    $position = $positionAndDirection[0]->getPosition();
    $direction = $positionAndDirection[1]->getDirection();

    return [$position, $direction];
}


echo " \n \n \n \n";

echo "Touchdown confirmed, Rover is safely on the surface of Mars \n";

echo "\nRemember: \nThe landing point is considered the coordinate [0,0] and the rover is facing north. \nThe rover's range of action is 100 positions, and it will avoid leaving this range.\n \nIn the case of entering an incorrect command in the control chain, the rover will emit it and proceed with the next one. If it encounters any obstacle or reaches the limit of the control range, it will stop and inform you of its current position.";

echo "\n \n";

echo "Controls: \nMove Forward: F \nMove Rigth: R \nMove Left: L \nWrite END to disconect the rover \n \n";

$commands = strtoupper(readline("insert the commands:\n"));


while($commands !== "END"){
    try{

        $finalPositionAndDirection = ReaderAndExecutorCommands::readAndExecuteCommands($commands, $rover, $obstacleArray);
        [$finalPosition, $finalDirection] = extractPositionAndDirection($finalPositionAndDirection);
        echo "Comads done, the actual position is: \n[".$finalPosition[0].",".$finalPosition[1]."] ".$finalDirection;
    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        $commands = strtoupper(readline("\n \nInsert new commands:\n"));
    }
    
}
    
echo "rover disconected.";