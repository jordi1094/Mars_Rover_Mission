<?php

declare(strict_types=1);

namespace App\logic;

use App\class\Position;
use App\class\Direction;
use Exception;


class Mover
{

    private static function nextPositionAble(int $x, int $y, array $obstaclesArray): bool
    {
        foreach ($obstaclesArray as $obstacle) {
            $coordinates = $obstacle->getCoordinates();
            if ($coordinates === [$x, $y]) {
                return false;
            }
        }
        return true;
    }

    public static function moveForward(Position $currentPosition, Direction $direction, array $obstaclesArray, $maxRange): Position
    {

        list($x, $y) = $currentPosition->getPosition();

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


        if (self::nextPositionAble($x, $y, $obstaclesArray)) {

            if ($x > $maxRange || $x < -$maxRange || $y > $maxRange || $y < -$maxRange) {
                $newPosition = $currentPosition;
                throw new Exception("The next step is not possible, if you go away this point you will lose the control from the rover. Your actual Position is: [" . $currentPosition->getPosition()[0] . "," . $currentPosition->getPosition()[1] . "] " . $direction->getDirection());
            } else {
                $newPosition = new Position($x, $y);
                return $newPosition;
            }
        } else {
            $obstacleCoordinates = [$x, $y];
            $newPosition = $currentPosition;
            throw new Exception(
                "Obstacle detected at position [" . $obstacleCoordinates[0] . "," . $obstacleCoordinates[1] .
                    "]. Movement stopped. Current position: [" . $newPosition->getPosition()[0] . "," .
                    $newPosition->getPosition()[1] . "] " . $direction->getDirection()
            );
        }
    }
}
