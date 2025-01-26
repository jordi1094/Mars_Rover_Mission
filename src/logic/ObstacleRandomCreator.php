<?php
declare(strict_types=1);

namespace App\logic;
use App\class\Obstacle;

class ObstacleRandomCreator
{
    private static array $obstaclesArray = [];

    private static function randomNumberGenerator(int $min = -100, int $max = 100):int
    {
        

        $randomNumber = rand($min, $max);

        return $randomNumber;
    }

    public static function isObjectUnique($x, $y):bool
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

    public static function createRandomObstacleList(array $roverCoordinates, int $obstacleQuantity, int $maxRange):array
    {
        self::$obstaclesArray = [];
        $count = 0;
        
        while($count < $obstacleQuantity){
            $x = self::randomNumberGenerator(-$maxRange, $maxRange);
            $y = self::randomNumberGenerator(-$maxRange, $maxRange);

            if(self::isObjectUnique($x, $y) && [$x, $y] !== $roverCoordinates){
                $obstacle = new Obstacle([$x, $y]);
                
                self::$obstaclesArray[] = $obstacle;
                $count++;
            }

        }
        return self::$obstaclesArray;
    }

    public static function getObstacleArray():array
    {
        return self::$obstaclesArray;
    }
}