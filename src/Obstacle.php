<?php

namespace App;

use App\Position;

class Obstacle
{
    private Position $position;

    public function __construct($obstacleSite)
    {
        $this-> position = new Position ($obstacleSite[0], $obstacleSite[1]);
    }

    public function getPosition()
    {
        return $this->position->getposition();
    }
}