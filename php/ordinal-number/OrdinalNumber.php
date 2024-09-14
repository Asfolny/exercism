<?php declare(strict_types=1);

function toOrdinal(int $number): string
{
    // NOTE: english doesn't use "st", "nd" and "rd" on 11, 12, 13... for "historic" reasons
    $suffix = match(true) {
        $number === 0 => "",
        $number != 11 && substr((string)$number, -1, 1) === "1" => "st",
        $number != 12 && substr((string)$number, -1, 1) === "2" => "nd",
        $number != 13 && substr((string)$number, -1, 1) === "3" => "rd",
        default => "th",
    };

    return "{$number}{$suffix}";
}
