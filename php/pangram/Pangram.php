<?php declare(strict_types=1);

function isPangram(string $string): bool
{
    $letterCount = 26;
    $letterSet = [];
    foreach(str_split(strtolower($string)) as $char) {
        if (ctype_alpha($char) && !in_array($char, $letterSet))
            $letterSet[] = $char;
    }

    return count($letterSet) === $letterCount;
}
