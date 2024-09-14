<?php declare(strict_types=1);

const PRICE = 8;
const DISCOUNTS = [
    2 => 0.05, // 5%
    3 => 0.1, // 10%
    4 => 0.2, // 20%
    5 => 0.25, // 25%
];

function total(array $basket): float
{
    return price(array_count_values($basket));
}

function price(array $counts): float
{
    $results = [];
    $max = count($counts);
    for ($n = 1; $n <= $max; $n++) {
        $discount = PRICE - (PRICE * (float) (DISCOUNTS[$n] ?? 0));
        $results[] = $n * $discount + price(decr($counts, $n));
    }
    return empty($counts) ? 0 : min($results);
}

function decr(array $array, int $n): array
{
    assert(array_filter($array) === $array);
    while ($n-- > 0) {
        --$array[key($array)];
        next($array);
    }

    return array_filter($array);
}