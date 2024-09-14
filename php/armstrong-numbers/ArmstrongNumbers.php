<?php declare(strict_types=1);

function isArmstrongNumber(int $number): bool
{
    $total = 0;
    $numStr = (string)$number;
    $len = strlen($numStr);

    foreach(str_split($numStr) as $int) {
        $total += $int ** $len;
    }
    
    return $total === $number;
}
