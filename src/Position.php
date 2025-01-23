<?php

namespace App;

class Position
{
    private int $x;
    private int $y;

    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setPosition($newPosition)
    {
        $this->x = $newPosition[0];
        $this->y = $newPosition[1];
    }

    public function getPosition()
    {
        return [$this->x, $this->y];
    }
}