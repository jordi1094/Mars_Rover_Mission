<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\logic\ObstacleRandomCreator;
use App\class\Rover;

class ObstacleRandomCreatorTest extends TestCase
{
    public function testObstacleRandomCreator()
    {
        $rover = new Rover();
        $obstacleQuantity = 60;
        $maxRange = 200;
        $ObjectsArray = ObstacleRandomCreator::createRandomObstacleList($rover->getCoordinates(), $obstacleQuantity, $maxRange);
        $this->assertEquals($obstacleQuantity, count($ObjectsArray));
    }
}
