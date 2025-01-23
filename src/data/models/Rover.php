<?php

namespace App;
use Exception;

class Rover
{
    public function __construct()
    {}

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