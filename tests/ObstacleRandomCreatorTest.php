<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use App\ObstacleRandomCreator;
use App\Rover;

class ObstacleRandomCreatorTest extends TestCase
{
    public function testObstacleRandomCreator()
    {
        $rover = new Rover();
        $obstacleQuantity = 60;
        $ObjectsArray = ObstacleRandomCreator::createRandomObstacleList($rover->getCoordinates(), $obstacleQuantity);
        $this->assertEquals(count($ObjectsArray), $obstacleQuantity);
    }
}
