<?php

declare(strict_types=1);

namespace Kata;

final class Simon
{
    /**
     * @var list<Color>
     */
    private array $colors = [];

    public function __construct(
        private readonly ColorGenerator $colorGenerator
    ) {
    }

    public function playRound(): array
    {
        $this->colors = $this->colorGenerator->generate(count($this->colors) + 1);

        return $this->colors;
    }

    /**
     * @param list<Color> $colors
     */
    public function userInteract(array $colors): bool
    {
        return array_values($this->colors) === array_values($colors);
    }
}
