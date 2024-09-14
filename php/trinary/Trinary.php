<?php declare(strict_types=1);

function toDecimal(string $number): int
{
    $result = 0;
    if (preg_match("/([^0-2])/", $number)) // Contains any value that is not 0, 1 or 2
        return $result;

    $cur = strlen($number)-1;
    foreach(str_split($number) as $num) {
        $result += $num * 3 ** $cur;
        $cur--;
    }

    return $result;
}
