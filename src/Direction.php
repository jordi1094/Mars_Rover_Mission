<?php

namespace App;

class Direction
{
    private string $direction;
    private $validDirections = ["N", "E", "S", "W"];

    public function __construct($direction)
    {
        $this->direction = $direction;
    }

    public function setDirection($newDirection)
    {
        $this->direction = $newDirection;
    }

    public function getDirection()
    {
        return $this->direction;
    }
}
