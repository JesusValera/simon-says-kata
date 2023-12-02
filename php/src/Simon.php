<?php

declare(strict_types=1);

namespace Kata;

final class Simon
{
    /**
     * @var list<Color>
     */
    private array $colors = [];

    /**
     * @return list<Color>
     */
    public function generateColor(ColorGenerator $colorGenerator): array
    {
        $this->colors[] = $colorGenerator->generateColor();

        return $this->colors;
    }

    /**
     * @param list<Color> $colors
     */
    public function play(array $colors): bool
    {
        foreach ($colors as $k => $color) {
            if ($color->value !== $this->colors[$k]->value) {
                $this->colors = [];
                return true;
            }
        }

        return false;
    }
}

enum Color: string
{
    case COLOR_RED = 'red';
    case COLOR_BLUE = 'blue';
    case COLOR_YELLOW = 'yellow';
    case COLOR_GREEN = 'green';
}

interface ColorGenerator
{
    public function generateColor(): Color;
}

final class RandomColorGenerator implements ColorGenerator
{
    public function generateColor(): Color
    {
        $rnd = random_int(1, 4);

        return match ($rnd) {
            1 => Color::COLOR_RED,
            2 => Color::COLOR_BLUE,
            3 => Color::COLOR_YELLOW,
            4 => Color::COLOR_GREEN,
        };
    }
}

final class MockColorGenerator implements ColorGenerator
{
    public function generateColor(Color $color = null): Color
    {
        return Color::COLOR_RED;
    }
}
