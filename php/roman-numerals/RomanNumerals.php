<?php declare(strict_types=1);

function toRoman(int $number): string
{
    $r = "";
    $partitions = [
        [1000, "M"],
        [900, "CM"],
        [500, "D"],
        [400, "CD"],
        [100, "C"],
        [90, "XC"],
        [50, "L"],
        [40, "XL"],
        [10, "X"],
        [9, "IX"],
        [5, "V"],
        [4, "IV"],
        [1, "I"]
    ];

    foreach($partitions as $part) {
        while ($number >= $part[0]) {
            $r .= $part[1];
            $number -= $part[0];
        }
    }

    return $r;
}
