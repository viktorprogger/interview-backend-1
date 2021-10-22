<?php

declare(strict_types=1);

enum Color {
    case RED;
    case BLUE;
}

final class Ball {
    private static $instances = [];

    private function __construct(public readonly Color $color, public readonly int $number)
    {
    }

    public static function instance(Color $color, int $number): self
    {
        if (!isset(self::$instances[$color->name][$number])) {
            self::$instances[$color->name][$number] = new self($color, $number);
        }

        return self::$instances[$color->name][$number];
    }
}
