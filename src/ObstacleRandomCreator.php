<?php
declare(strict_types=1);

namespace App;
use App\Obstacle;

class ObstacleRandomCreator
{
    private static $obstaclesArray = [];

    private static function randomNumberGenerator($min = -100, $max = 100)
    {
        $randomNumber = rand($min, $max);

        return $randomNumber;
    }

    public static function isObjectUnique($x, $y)
    {
        foreach (self::$obstaclesArray as $obstacle)
        {
            $coordinates = $obstacle->getCoordinates();
            if($coordinates === [$x,$y]){
                return false;
            }
            
        }
        return true;
    }

    public static function createRandomObstacleList($roverCoordinates, $obstacleQuantity)
    {
        $count = 0;
        
        while($count < $obstacleQuantity){
            $x = self::randomNumberGenerator();
            $y = self::randomNumberGenerator();

            if(self::isObjectUnique($x, $y)){
                $obstacle = new Obstacle([$x, $y]);
                
                self::$obstaclesArray[] = $obstacle;
                $count++;
            }

        }

        return self::$obstaclesArray;
    }
}