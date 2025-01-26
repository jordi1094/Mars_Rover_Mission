<?php

declare(strict_types=1);

namespace App\logic;


class Rotator
{
    public const ORDER_DIRECTION = ["N", "E", "S", "W"];

    /**
     * Rotates the rover's direction based on the given input.
     * This function takes the current direction of the rover and rotates it 
     * either to the right or left based on the rotate input ("R" or "L").
     * It calculates the new direction by finding the current direction's index
     * in the ORDER_DIRECTION array and adjusting it based on the rotation input.
     *
     * @param string $rotateInput The direction of the rotation ("R" for right, "L" for left).
     * @param string $currentDirection The current direction the rover is facing.
     * @return string The new direction of the rover after rotation.
     */
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
