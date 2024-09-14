<?php declare(strict_types=1);

function parse_binary(string $binary): int
{
    if (preg_match('/[^0-1]/', $binary)) {
        throw new InvalidArgumentException("Binary contains non-binary elements");
    }
    $result = 0;
    foreach(array_reverse(str_split($binary)) as $index => $digit) {
        $realNum = $digit * (2 ** ($index));
        $result += $realNum;
    }

    return $result;
}
