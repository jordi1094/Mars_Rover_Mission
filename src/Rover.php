<?php
declare(strict_types=1);

namespace App;

use App\Position;
use App\Direction;
use App\Mover;
use App\Rotator;

class Rover
{
    private Position $position;
    private Direction $direction;

    public function __construct($x=0, $y=0, $direction = "N")
    {
        $this->position = new Position($x, $y);
        $this->direction = new Direction($direction);
    }

    public function getCoordinates()
    {
        return $this->position->getPosition();
    }

    public function getFacingDirection()
    {
        return $this->direction;
    }

    public function moveRoverForward()
    {
        $currentPosition = $this->position;
        $currentDirection= $this->direction;
        
        $newPosition = Mover::moveForward($currentPosition, $currentDirection);

        $this->position->setPosition($newPosition);
    }

    public function RotateDirection($rotateInput)
    {
        $currentDirection = $this->direction->getDirection();

        $newDirection =  Rotator::rotate($rotateInput, $currentDirection);

        $this->direction->setDirection($newDirection);

    }
}