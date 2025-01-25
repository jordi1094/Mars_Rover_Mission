<?php
declare(strict_types=1);

namespace App;

class Direction
{
    private string $direction;

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
