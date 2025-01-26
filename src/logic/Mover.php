<?php

declare(strict_types=1);

namespace App\logic;

use App\models\Position;
use App\models\Direction;
use App\models\Map;
use Exception;


class Mover
{   
    /**
     * calculates the new position considering the rover is moving forward.
     * @param Position $position the current rover position.
     * @param Direction $direction the current rover direction.
     * @return Position the new position of the rover.
     */
    private static function getNextPosition(Position $position, Direction $direction):Position
    {
        list($x, $y) = $position->getPosition();

         switch ($direction->getDirection()) {
            case "N":
                $y += 1;
                break;
            case "S":
                $y -= 1;
                break;
            case "E":
                $x += 1;
                break;
            case "W":
                $x -= 1;
                break;
        }
        return new Position($x, $y);
    }

    /**
     * Checks if the next position is blocked by an obstacle.
     * This function compares the next position to the positions of obstacles in the map.
     *
     * @param Position $position The position to check.
     * @param array $obstaclesArray The list of obstacles on the map.
     * @return bool True if the position is free of obstacles, false otherwise.
     */
    private static function nextPositionAble(Position $position, array $obstaclesArray): bool
    {
        foreach ($obstaclesArray as $obstacle) {
            $coordinates = $obstacle->getCoordinates();
            if ($coordinates === $position->getPosition() ) {
                return false;
            }
        }
        return true;
    }

    /**
     * Determines if the given position is outside the bounds of the map.
     * It checks if the position is within the maximum allowed range on the map.
     *
     * @param Position $position The position to check.
     * @param int $maxRange The maximum allowable range (positive and negative) on the map.
     * @return bool True if the position is outside the bounds, false otherwise.
     */
    private static function isOutsideBounds(Position $position, int $maxRange):bool
    {
        list($x, $y) = $position->getPosition();

        return ($x > $maxRange || $x < -$maxRange || $y > $maxRange || $y < -$maxRange);

    }

    /**
     * Moves the rover forward by one step, considering obstacles and boundaries.
     * This function calculates the next position, checks if there are obstacles, 
     * and verifies if the rover will stay within the bounds of the map.
     *
     * @param Position $currentPosition The current position of the rover.
     * @param Direction $direction The current direction the rover is facing.
     * @param Map $map The map containing obstacles and boundaries.
     * @return Position The new position of the rover after moving forward.
     * @throws Exception If an obstacle is detected or if the next position is out of bounds.
     */
    public static function moveForward(Position $currentPosition, Direction $direction, Map $map): Position
    {

        $maxRange = $map->getMaxRange();
        $obstaclesArray = $map->getObstaclesArray();
        
        $nextPosition = self::getNextPosition($currentPosition, $direction);

        if (!self::nextPositionAble($nextPosition, $obstaclesArray)) {
            throw new Exception(
                "Obstacle detected at position ".$nextPosition.". Movement stopped. Current position: ".$currentPosition. " " . $direction->getDirection()
            );
        }

        if (self::isOutsideBounds($nextPosition, $maxRange)) {
            throw new Exception("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: ".$currentPosition ." " . $direction->getDirection());
        }
        
        return $nextPosition;
    }
}
