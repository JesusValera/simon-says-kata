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
    public function test_simon(): void
    {
        $mockColorGenerator = new MockColorGenerator([Color::COLOR_RED]);
        $simon = new Simon($mockColorGenerator);

        $simon->playRound();

        $userColors = [Color::COLOR_RED];
        self::assertTrue($simon->userInteract($userColors));
    }

    public function test_simon_2(): void
    {
        $mockColorGenerator = new MockColorGenerator([Color::COLOR_RED, Color::COLOR_BLUE]);
        $simon = new Simon($mockColorGenerator);

        $simon->playRound();
        $userColors = [Color::COLOR_RED];
        self::assertTrue($simon->userInteract($userColors));

        $userColors = [Color::COLOR_RED, Color::COLOR_BLUE];
        $simon->playRound();
        self::assertTrue($simon->userInteract($userColors));
    }

    public function test_simon_player_loses(): void
    {
        $mockColorGenerator = new MockColorGenerator([Color::COLOR_RED]);
        $simon = new Simon($mockColorGenerator);

        $userColors = [Color::COLOR_BLUE];
        $simon->playRound();
        self::assertFalse($simon->userInteract($userColors));
    }
}
