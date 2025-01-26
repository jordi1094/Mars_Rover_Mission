<?php

declare(strict_types=1);

namespace App\logic;


class Rotator
{
    private static array $orderDirections = ["N", "E", "S", "W"];

    public static function rotate(string $rotateInput, string $currentDirection): string
    {
        $currentIndex = array_search($currentDirection, self::$orderDirections);

        if ($rotateInput === "R") {
            $newIndex = $currentIndex + 1;
        } else {
            $newIndex = $currentIndex - 1;
        }

        $finalIndexInArray = ($newIndex + count(self::$orderDirections)) % count(self::$orderDirections);




        $newDirection = self::$orderDirections[$finalIndexInArray];

        return $newDirection;
    }
}
