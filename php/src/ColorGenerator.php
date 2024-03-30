<?php

declare(strict_types=1);

namespace Kata;

interface ColorGenerator
{
    /**
     * @return list<Color>
     */
    public function generate(int $round): array;
}
