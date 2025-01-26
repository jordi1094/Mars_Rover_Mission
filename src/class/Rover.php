<?php
declare(strict_types=1);

namespace App\class;

use App\class\Position;
use App\class\Direction;
use App\logic\Mover;
use App\logic\Rotator;

class Rover
{
    private Position $position;
    private Direction $direction;

    public function __construct(int $x=0, int $y=0, string $direction = "N")
    {
        $this->position = new Position($x, $y);
        $this->direction = new Direction($direction);
    }

    public function getCoordinates():array
    {
        return $this->position->getPosition();
    }

    public function getFacingDirection():Direction
    {
        return $this->direction;
    }

    public function getPositionAndDirectionResume():array
    {
        return [$this->position ,$this->direction];
    }

    public function moveRoverForward($obstaclesArray, $maxRange)
    {
        $currentPosition = $this->position;
        $currentDirection= $this->direction;
        
        $newPosition = Mover::moveForward($currentPosition, $currentDirection, $obstaclesArray, $maxRange);

        $this->position->setPosition($newPosition);

        
    }

    public function rotateDirection($rotateInput)
    {
        $currentDirection = $this->direction->getDirection();

        $newDirection =  Rotator::rotate($rotateInput, $currentDirection);

        $this->direction->setDirection($newDirection);

    }
}