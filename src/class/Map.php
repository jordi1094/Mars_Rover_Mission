<?php

namespace App\class;
use App\logic\ObstacleRandomCreator;

class Map
{
    private int $mapSice;
    private int $medianInteractionBetweenObstacles = 60;
    private int $obstaclesQuantity;
    private int $maxRangeMovement;
    private array $obstacleArray;

    public function __construct($mapSice, $roverCoordinates, ?int $obstaclesQuantity = null)
    {
        $this->obstaclesQuantity = $obstaclesQuantity ?? round(($mapSice * $mapSice)*(1/$this->medianInteractionBetweenObstacles));
        $this->mapSice = $mapSice;
        $this->maxRangeMovement = $this->mapSice/2;

        $this->obstacleArray = ObstacleRandomCreator::createRandomObstacleList($roverCoordinates, $this->obstaclesQuantity, $this->maxRangeMovement);
    }

    public function getMaxRange():int
    {
        return $this->maxRangeMovement;
    }

    public function getObstaclesArray():array
    {
        return $this->obstacleArray;
    }

}