<?php


namespace App;

class Position
{
    private int $x;
    private int $y;

    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setPosition($newPosition)
    {
        $this->x = $newPosition->x;
        $this->y = $newPosition->y;
    }

    public function getPosition()
    {
        return [$this->x, $this->y];
    }
}