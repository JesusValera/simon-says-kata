<?php

declare(strict_types=1);

namespace KataTests;

use Kata\Color;
use Kata\MockColorGenerator;
use Kata\Simon;
use PHPUnit\Framework\TestCase;

final class SimonTest extends TestCase
{
    /**
     * The computer generates a random color (green, red, blue or yellow) and a tone linked to that color
     * If the player presses the correct combination of colors, a new color will be appended at the end of the list
     * If the player selects an incorrect color, then the game is over
     * The game runs until the player loses
     */

    public function test_return_red(): void
    {
        $simon = new Simon();

        $colorGenerator = new MockColorGenerator();
        $colors = $simon->generateColor($colorGenerator);

        self::assertSame($colors, [Color::COLOR_RED]);
    }

    public function test_return_red_multiple_times(): void
    {
        $simon = new Simon();

        $colorGenerator = new MockColorGenerator();
        $simon->generateColor($colorGenerator);
        $simon->generateColor($colorGenerator);
        $colors = $simon->generateColor($colorGenerator);

        self::assertSame($colors, [Color::COLOR_RED, Color::COLOR_RED, Color::COLOR_RED]);
    }
}
