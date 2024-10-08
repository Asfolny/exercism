<?php declare(strict_types=1);

function isLeap(int $year): bool
{
    if ($year % 100 === 0) {
        return $year % 400 === 0;
    }

    return $year % 4 === 0;
}
