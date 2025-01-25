<?php
declare(strict_types=1);

namespace App;


class Rotator
{
    private static $orderDirections = ["N", "E", "S", "W"];

    public static function rotate($rotateInput, $currentDirection):string
    {
        $currentIndex = array_search($currentDirection, self::$orderDirections);
        
        if ($rotateInput === "R"){
            $newIndex = $currentIndex +1;
        }else{
            $newIndex = $currentIndex -1;
        }
        
        $finalIndexInArray = ($newIndex + count(self::$orderDirections)) % count(self::$orderDirections);

        
        
        
        $newDirection = self::$orderDirections[$finalIndexInArray];
        
        return $newDirection;
    }
}