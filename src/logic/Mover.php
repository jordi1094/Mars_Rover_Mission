<?php

declare(strict_types=1);

namespace App\logic;

use App\models\Position;
use App\models\Direction;
use App\models\Map;
use Exception;


class Mover
{   
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

    private static function isOutsideBounds(Position $position, int $maxRange):bool
    {
        list($x, $y) = $position->getPosition();

        return ($x > $maxRange || $x < -$maxRange || $y > $maxRange || $y < -$maxRange);

    }

    public static function moveForward(Position $currentPosition, Direction $direction, Map $map): Position
    {

        $maxRange = $map->getMaxRange();
        $obstaclesArray = $map->getObstaclesArray();
        
        $nextPosition = self::getNextPosition($currentPosition, $direction);

        if (!self::nextPositionAble($nextPosition, $obstaclesArray)) {
            
            $newPosition = $currentPosition;
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
