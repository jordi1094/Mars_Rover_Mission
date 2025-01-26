<?php

declare(strict_types=1);

namespace App\logic;

use App\models\Obstacle;

class ObstacleRandomCreator
{
    private static array $obstaclesArray = [];


    public static function isObjectUnique($x, $y): bool
    {
        foreach (self::$obstaclesArray as $obstacle) {
            $coordinates = $obstacle->getCoordinates();
            if ($coordinates === [$x, $y]) {
                return false;
            }
        }
        return true;
    }

    public static function createRandomObstacleList(array $roverCoordinates, int $obstacleQuantity, int $maxRange): array
    {
        self::$obstaclesArray = [];
        $count = 0;

        while ($count < $obstacleQuantity) {
            $x = rand(-$maxRange, $maxRange);
            $y = rand(-$maxRange, $maxRange);

            if (self::isObjectUnique($x, $y) && [$x, $y] !== $roverCoordinates) {
                $obstacle = new Obstacle([$x, $y]);

                self::$obstaclesArray[] = $obstacle;
                $count++;
            }
        }
        return self::$obstaclesArray;
    }

    public static function getObstacleArray(): array
    {
        return self::$obstaclesArray;
    }
}
