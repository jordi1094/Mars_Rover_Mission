<?php

namespace App;
use Exception;

class Rover
{
    private $position;
    private $direction;

    private $correctDirections = ["N", "E", "S", "W"];

    private function checkPositionValue($value)
    {
        if($value >= 0 && $value < 200)
        {
            return true;
        }
    }

    public function __construct($positionX, $positionY, $direction)
    {
        if($this->checkPositionValue($positionX) && $this->checkPositionValue($positionY)){
            $this->position = [$positionX, $positionY];
        }else {
            throw new Exception ("The value from positionX and positionY has to be bigger than 0 and smaller than 200, insert again the values");
        }
        
        if(in_array(strtoupper($direction), $this->correctDirections)){
            $this->direction = strtoupper($direction);
        } else {
            throw new Exception("The value from the diraction has to be N, S, E or W in text. Try again.");
        }
    }

    public function getPosition()
    {
        return $this->position;
    }
    public function getDirection()
    {
        return $this->direction;
    }

    public function moveFoward($direction)
    {
        if($direction === "N"){
            $this->position[1] += 1;
        }elseif($direction === "S"){
            $this->position[1] -= 1;
        }elseif($direction === "E"){
            $this->position[0] += 1;
        }elseif($direction === "W"){
            $this->position[0] -= 1;
        }
    }

}