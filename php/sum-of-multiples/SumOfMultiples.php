<?php declare(strict_types=1);

function sumOfMultiples(int $input, array $multipliers): int
{
    $multiples = [];
    foreach ($multipliers as $multiplier) {
        if ($multiplier >= $input || $multiplier < 1) {
            continue;
        }

        $i = 1;
        while (($x = $multiplier * $i) < $input) {
            $multiples[$x] = null;
            $i++;
        }
    }

    return array_sum(array_keys($multiples));
}