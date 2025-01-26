<?php

use PHPUnit\Framework\TestCase;
use App\models\Rover;

class GetCoordinatesTest extends TestCase
{
    public function testGetCoordinades()
    {
        $rover = new Rover();
        $position = $rover->getCoordinates();
        $this->assertEquals([0, 0], $position);
    }
}
