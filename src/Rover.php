<?php

namespace App;

use Exception;
use App\Position;
use App\Direction;

class Rover
{
    private Position $position;
    private Direction $direction;

    public function __construct($x=0, $y=0, $direction = "N")
    {
        $this->position = new Position($x, $y);
        $this->direction = new Direction($direction);
    }

    public function getPosition()
    {
        return $this->position->getPosition();
    }
    public function getDirection()
    {
        return $this->direction->getDirection();
    }

    public function moveFoward()
    {
        $currentPosition = $this->getPosition();
        
       switch($this->direction->getDirection()){
        case "N":
            $currentPosition[1] += 1;
            break;
        case "S":
            $currentPosition[1] -=1;
            break;
        case "E":
            $currentPosition[0] +=1;
            break;
        case "W":
            $currentPosition[0] -=1;
            break;
       } 
       $this->position->setPosition($currentPosition);
    }

}