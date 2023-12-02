<?php

declare(strict_types=1);

namespace KataTests;

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

    public function test_assert_true(): void
    {
        $simon = new Simon();

        $result = $simon->play();

        self::assertEquals(true, $result);
    }
}
