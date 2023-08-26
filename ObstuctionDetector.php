<?php

class ObstuctionDetector
{
    public static int|float $speed;
    public static array $point_a;
    public static array $point_b;

    public function __construct(int|float $speed, array $point_a, array $point_b)
    {
        // Set the speed and distance for the current object instance.
        self::$speed = $speed;
        self::$point_a = $point_a;
        self::$point_b = $point_b;
    }

    public static function getDistance(): float|int
    {
        // calculate the distance between two points and return the result in miles
        $result = sqrt(pow(self::$point_b[0] - self::$point_a[0], 2) + pow(self::$point_b[1] - self::$point_b[1], 2));

        return $result;
    }

    public static function getExpectedTime(float|int $distance): float|int
    {
        // Calculate the expected time to get from point A to Point B
        // Expected time = distance/speed.

        $result = $distance/self::$speed;

        return $result;
    }

    public static function isPenetrable(int|float $timeDuration): bool
    {
        $distance = self::getDistance();
        $expectedTime = self::getExpectedTime($distance);

        // Check if obstruction is penetrable or not and return boolean result
        // Obstuction is mpenetrable if timeDuration if greater than expected time by 60Mins
        if ($timeDuration > ($expectedTime + 60)) {
            return false;
        } 

        return true;

    }
}