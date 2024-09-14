<?php declare(strict_types=1);

function isIsogram(string $word): bool
{
    $word = str_replace([' ', '-'], '', $word);
    $seen = [];
    
    foreach(mb_str_split($word) as $char) {
        $char = mb_strtolower($char);

        if (in_array($char, $seen, true)) {
            var_dump($char);
            return false;
        }

        $seen[] = $char;
    }
    
    return true;
}
