<?php declare(strict_types=1);

function squareOfSum(int $max): int
{
    $r = 0;
    for ($i = 0; $i <= $max; $i++) {
        $r += $i;
    }
    return $r ** 2;
}

function sumOfSquares(int $max): int
{
    $r = 0;
    for ($i = 0; $i <= $max; $i++) {
        $r += $i**2;
    }
    return $r;
}

function difference(int $max): int
{
    return squareOfSum($max) - sumOfSquares($max);
}
