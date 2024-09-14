<?php declare(strict_types=1);

function raindrops(int $n): string
{
    $r = "";
    if ($n % 3 === 0)
        $r .= "Pling";
    if ($n % 5 === 0)
        $r .= "Plang";
    if ($n % 7 === 0)
        $r .= "Plong";

    return $r ?: (string)$n;
}
