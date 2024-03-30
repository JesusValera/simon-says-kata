<?php

declare(strict_types=1);

namespace Kata;

final readonly class MockColorGenerator implements ColorGenerator
{
    public function __construct(
        private array $colors = []
    ) {
    }

    public function generate(int $round): array
    {
        return array_slice($this->colors, 0, $round);
    }
}
