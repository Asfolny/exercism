<?php declare(strict_types=1);

function sieve(int $limit): array
{
    $list = range($offset = 2, $limit);

    foreach ($list as $value) {
        for ($i = ($value * 2) - $offset; $i <= $limit; $i += $value) {
            unset($list[(int) $i]);
        }
    }

    return array_values($list);
}