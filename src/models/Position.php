<?php


namespace App\models;

class Position
{
    private int $x;
    private int $y;

    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function setPosition(Position $newPosition):void
    {
        $this->x = $newPosition->x;
        $this->y = $newPosition->y;
    }

    public function getPosition(): array
    {
        return [$this->x, $this->y];
    }

    public function __toString(): string
    {
        return "[" . $this->x . "," . $this->y . "]";
    }
}
