<?php declare(strict_types=1);

function square(int $number): string
{
    if ($number < 1 || $number > 64) {
        throw new \InvalidArgumentException("Input must be between 1 and 64");
    }
    return sprintf("%u", 1 << ($number - 1));
}

function total(): string
{
    return sprintf("%u", (1 << 64) - 1);
}