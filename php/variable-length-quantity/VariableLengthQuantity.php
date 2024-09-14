<?php declare(strict_types=1);

function vlq_encode(array $input): array
{
    $result = [];

    foreach ($input as $integer) {
        if ($integer > 0xfffffff) {
            throw new InvalidArgumentException('Integer exceeds the maximum allowed value.');
        }

        $bytes = [];
        do {
            $byte = 0x7f & $integer;
            array_unshift($bytes, empty($bytes) ? $byte : 0x80 | $byte);
            $integer >>= 7;
        } while ($integer > 0);
        $result = array_merge($result, $bytes);
    }

    return $result;
}

function vlq_decode(array $input): array
{
    $result = [];
    $integer = 0;
    $byte = 0;

    foreach ($input as $byte) {
        if ($integer > 0xfffffff - 0x7f) {
            throw new OverflowException('Integer exceeds the maximum allowed value.');
        }

        $integer <<= 7;
        $integer |= 0x7f & $byte;

        if (($byte & 0x80) === 0) {
            $result[] = $integer;
            $integer = 0;
        }
    }

    if (($byte & 0x80) !== 0) {
        throw new InvalidArgumentException('Incomplete byte sequence.');
    }

    return $result;
}