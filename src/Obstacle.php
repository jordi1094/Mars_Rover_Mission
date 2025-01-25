<?php
declare(strict_types=1);

namespace App;

use App\Position;

class Obstacle
{
    private Position $position;

    public function __construct(array $obstacleSite)
    {
        $this-> position = new Position ($obstacleSite[0], $obstacleSite[1]);
    }

    public function getCoordinates():array
    {
        return $this->position->getposition();
    }
}