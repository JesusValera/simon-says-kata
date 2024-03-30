<?php

declare(strict_types=1);

namespace Kata;

final class RandomColorGenerator implements ColorGenerator
{
    private array $colors = [];

    /**
     * @return list<Color>
     */
    public function generate(int $round): array
    {
        $randomNumber = random_int(1, 4);

        $this->colors[$round] = match ($randomNumber) {
            1 => Color::COLOR_RED,
            2 => Color::COLOR_BLUE,
            3 => Color::COLOR_YELLOW,
            4 => Color::COLOR_GREEN,
        };

        return $this->colors;
    }
}
