<?php declare(strict_types=1);

function score(string $word): int
{
    $scoreset = [
        1 => ["A", "E", "I", "O", "U", "L", "N", "R", "S", "T"],
        2 => ["D", "G"],
        3 => ["B", "C", "M", "P"],
        4 => ["F", "H", "V", "W", "Y"],
        5 => ["K"],
        8 => ["J", "X"],
        10 => ["Q", "Z"]
    ];

    $score = 0;
    foreach(str_split($word) as $char) {
        foreach($scoreset as $points => $list) {
            if (in_array(strtoupper($char), $list)) {
                $score += $points;
                continue 2;
            }
        }
    }

    return $score;
}
