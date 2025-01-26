<?php

declare(strict_types=1);

namespace App\logic;


class Rotator
{
    public const ORDER_DIRECTION = ["N", "E", "S", "W"];

    public static function rotate(string $rotateInput, string $currentDirection): string
    {
        $directionCount = count(self::ORDER_DIRECTION);
        $currentIndex = array_search($currentDirection, self::ORDER_DIRECTION);

        if ($rotateInput === "R") {
            $newIndex = $currentIndex + 1;
        } else {
            $newIndex = $currentIndex - 1;
        }

        $finalIndexInArray = ($newIndex + $directionCount) % $directionCount;
        $newDirection = self::ORDER_DIRECTION[$finalIndexInArray];

        return $newDirection;
    }
}
