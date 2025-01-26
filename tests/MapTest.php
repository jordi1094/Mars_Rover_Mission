<?php

use PHPUnit\Framework\TestCase;
use App\class\Map;

class MapTest extends TestCase
{
    public function testGetMaxRange()
    {
        $mapsize = 200;
        $roverPosition = [0, 3];
        $map = new Map($mapsize, $roverPosition);
        $MaxRangeMovement = $map->getMaxRange();
        $this->assertEquals($MaxRangeMovement, $mapsize / 2);
    }

    public function testGetObstaclsArray()
    {
        $mapsize = 100;
        $roverPosition = [3, 20];
        $map = new Map($mapsize, $roverPosition);
        $obstacleArray = $map->getObstaclesArray();
        $this->assertIsArray($obstacleArray, "It retuns an Array");
    }
}
