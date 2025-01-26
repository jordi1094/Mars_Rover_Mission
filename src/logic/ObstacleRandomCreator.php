<?php

declare(strict_types=1);

namespace App\logic;

use App\models\Obstacle;

class ObstacleRandomCreator
{
    /**
     * Checks if the new obstacle is unique in the obstacles array.
     * This function compares the new obstacle with the existing obstacles
     * in the array to ensure there are no duplicates.
     *
     * @param Obstacle $newObstacle The new obstacle to check.
     * @param array $obstaclesArray The existing array of obstacles.
     * @return bool True if the obstacle is unique (not already in the array), false otherwise.
     */
    private static  function isObjectUnique(Obstacle $newObstacle, array $obstaclesArray): bool
    {
        foreach ($obstaclesArray as $obstacle) {
            if ($obstacle === $newObstacle) {
                return false;
            }
        }
        return true;
    }

    /**
     * Generates a random obstacle within the defined map range.
     * This function generates random X and Y coordinates within the range 
     * of the map's maximum range to create a new obstacle.
     *
     * @param int $maxRange The maximum allowed range on the map (positive or negative).
     * @return Obstacle A new obstacle at random coordinates.
     */
    private static function generateRandomObstacle(int $maxRange): Obstacle
    {
        $x = rand(-$maxRange, $maxRange);
        $y = rand(-$maxRange, $maxRange);

        return new Obstacle([$x, $y]);
    }

    /**
     * Creates a list of random obstacles while avoiding duplicates and the rover's position.
     * This function generates a list of random obstacles with a specific quantity,
     * ensuring that each obstacle is unique and that no obstacle is placed at the rover's position.
     *
     * @param array $roverCoordinates The coordinates of the rover to avoid placing obstacles at.
     * @param int $obstacleQuantity The number of obstacles to create.
     * @param int $maxRange The maximum allowed range for the obstacles.
     * @return array An array of randomly generated obstacles.
     */
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
