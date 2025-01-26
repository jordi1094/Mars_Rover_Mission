<?php

use PHPUnit\Framework\TestCase;
use App\class\Map;

class MapTest extends TestCase
{
    public function testGetMaxRange()
    {
        $mapSice = 200;
        $roverPosition = [0,3];
        $map = new Map($mapSice, $roverPosition);
        $MaxRangeMovement = $map->getMaxRange();
        $this->assertEquals($MaxRangeMovement, $mapSice/2 );
    }

    public function testGetObstaclsArray()
    {
        $mapSice = 100;
        $roverPosition = [3,20];
        $map = new Map($mapSice,$roverPosition);
        $obstacleArray = $map->getObstaclesArray();
        $this->assertIsArray($obstacleArray, "It retuns an Array");
    }
}