<?php


namespace App;
use App\ReaderAndExecutorCommands;
use App\ObstacleRandomCreator;
use App\Rover;

$mapSice = 200;
$medianInteractionBetweenObstacles = 15;
$obstacleQuantity = ($mapSice * $mapSice)*(1/$medianInteractionBetweenObstacles);
$rover = new Rover();
$obstacleArray = ObstacleRandomCreator::createRandomObstacleList($rover->getCoordinates(), $obstacleQuantity);


echo " \n \n \n \n";

echo "Touchdown confirmed, Rover is safely on the surface of Mars \n";

echo "\nRemember: \nThe landing point is considered the coordinate [0,0] and the rover is facing north. \nThe rover's range of action is 100 positions, and it will avoid leaving this range.\n \nIn the case of entering an incorrect command in the control chain, the rover will emit it and proceed with the next one. If it encounters any obstacle or reaches the limit of the control range, it will stop and inform you of its current position.";

echo "\n \n";

echo "Controls: \nMove Forward: F \nMove Rigth: R \nMove Left: L \nWrite END to disconect the rover \n \n";

$commands = strtoupper(readline("insert the commands:\n"));


while($commands !== "END"){
    ReaderAndExecutorCommands::readAndExecuteCommands($commands, $rover, $obstacleArray);
    
    $commands = strtoupper(readline("insert the commands:\n"));
    
}
    
echo "rover disconected.";