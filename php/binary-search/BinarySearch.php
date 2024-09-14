<?php declare(strict_types=1);

function find(int $needle, array $haystack): int
{
    if (empty($haystack) || (count($haystack) === 1 && current($haystack) !== $needle))
        return -1;

    if (current($haystack) === $needle)
        return 0;

    $middle = (int)floor(count($haystack)/2);
    $midVal = $haystack[$middle];
    if ($midVal === $needle)
        return $middle;

    if ($midVal < $needle) {
        $i = find($needle, array_slice($haystack, $middle));
        return $i === -1 ? -1 : $middle + $i;
    }

    return find($needle, array_slice($haystack, 0, $middle));
}