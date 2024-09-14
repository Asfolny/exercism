<?php declare(strict_types=1);

function factors(int $input): array
{
    $divisors = [];
    $divisor = 2;
    while ($input > 1) {
        if ($input % $divisor === 0) {
            $divisors[] = $divisor;
            $input /= $divisor;
            continue;
        }
        $divisor++;
    }
    return $divisors;
}