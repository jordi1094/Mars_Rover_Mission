<?php
declare(strict_types=1);

namespace App;

use App\Position;
use App\Direction;

class Mover {
    
    public static function moveForward(Position $currentPosition, Direction $direction):Position
    {
        list($x, $y) = $currentPosition->getPosition();

        switch($direction->getDirection()){
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
        $newPosition = new Position($x, $y);

        return $newPosition;
    }
}