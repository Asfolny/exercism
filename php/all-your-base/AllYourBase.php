<?php declare(strict_types=1);

function rebase(int $fromBase, array $digits, int $toBase): array
{
    if ($fromBase < 2) {
        throw new InvalidArgumentException("input base must be >= 2");
    }

    if ($toBase < 2) {
        throw new InvalidArgumentException("output base must be >= 2");
    }
    $baseTen = 0;

    foreach(array_reverse($digits) as $index => $digit) {
        if ($digit < 0 || $digit >= $fromBase) {
            throw new InvalidArgumentException("all digits must satisfy 0 <= d < input base");
        }
        $realNum = $digit * ($fromBase ** ($index));
        $baseTen += $realNum;
    }

    $result = [];
    $counter = 1000;
    while ($baseTen >= $toBase) {
        $remainder = $baseTen % $toBase;
        $baseTen = (int)floor($baseTen / $toBase);
        $result[] = $remainder;
        $counter--;
        if ($counter < 1){
            break;
        }
    }

    $result[] = $baseTen % $toBase;

    return array_reverse($result);
}
