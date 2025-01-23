<?php

use PHPUnit\Framework\TestCase;
use App\Rover;

class MoveFowardTest extends TestCase
{
    public function testMoveFowardDirectionNorth()
    {

        $rover = new Rover(0,0,"N");
        $rover-> moveFoward("N");
        $this-> assertEquals([0,1],$rover->getPosition());
    }
}