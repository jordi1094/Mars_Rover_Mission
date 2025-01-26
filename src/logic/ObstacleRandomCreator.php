<?php

declare(strict_types=1);

namespace App\logic;

use App\models\Obstacle;

class ObstacleRandomCreator
{   
    private static  function isObjectUnique(Obstacle $newObstacle, $obstaclesArray): bool
    {
        foreach ($obstaclesArray as $obstacle) {
            if ($obstacle === $newObstacle) {
                return false;
            }
        }
        return true;
    }

    private static function generateRandomObstacle( int $maxRange):Obstacle
    {
        $x = rand(-$maxRange, $maxRange);
        $y = rand(-$maxRange, $maxRange);

        return new Obstacle([$x, $y]);
    }

    public static function createRandomObstacleList(array $roverCoordinates, int $obstacleQuantity, int $maxRange): array
    {
        $obstaclesArray = [];
        $count = 0;

        while ($count < $obstacleQuantity) {
            $newObstacle = self::generateRandomObstacle($maxRange);
            if (self::isObjectUnique($newObstacle, $obstaclesArray) && $newObstacle->getCoordinates() !== $roverCoordinates) {
                
                $obstaclesArray[] = $newObstacle;
                $count++;
            }
        }
        return $obstaclesArray;
    }
}
