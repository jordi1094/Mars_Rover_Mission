<?php

declare(strict_types=1);

namespace App\models;

class Direction
{
    private string $direction;

    public function __construct(string $direction)
    {
        $this->direction = $direction;
    }

    public function setDirection(string $newDirection)
    {
        $this->direction = $newDirection;
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
}
