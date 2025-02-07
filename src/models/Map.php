<?php

namespace App\models;

use App\logic\ObstacleRandomCreator;

class Map
{
    private int $mapsize;
    private int $medianInteractionBetweenObstacles = 60;
    private int $obstaclesQuantity;
    private int $maxRangeMovement;
    private array $obstacleArray;

    public function __construct(int $mapsize, array $roverCoordinates, ?int $obstaclesQuantity = null)
    {
        $this->obstaclesQuantity = $obstaclesQuantity ?? round(($mapsize * $mapsize) * (1 / $this->medianInteractionBetweenObstacles));
        $this->mapsize = $mapsize;
        $this->maxRangeMovement = $this->mapsize / 2;

        $this->obstacleArray = ObstacleRandomCreator::createRandomObstacleList($roverCoordinates, $this->obstaclesQuantity, $this->maxRangeMovement);
    }

    public function getMaxRange(): int
    {
        return $this->maxRangeMovement;
    }

    public function getObstaclesArray(): array
    {
        return $this->obstacleArray;
    }
    public function setObstaclesArray(array $obstaclesArray):void
    {
        $this->obstacleArray = $obstaclesArray;
    }
}
