<?php declare(strict_types=1);

function slices(string $digits, int $series): array
{
    if (strlen($digits) < $series)
        throw new InvalidArgumentException("series is larger than digits");
    if ($series < 1)
        throw new InvalidArgumentException("cannot produce series of less than 1");

    $r = [];
    for ($i = 0; $i <= strlen($digits) - $series; $i++) {
        $r[] = substr($digits, $i, $series);
    }

    return $r;
}
