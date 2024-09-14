<?php declare(strict_types=1);

function wordCount(string $words): array
{
    $words = preg_replace("/[^a-z0-9']/", ' ', strtolower($words));
    $counted = [];
    foreach(explode(' ', $words) as $word) {
        if ($word === '') continue;
        if (!isset($counted[$word])) $counted[$word] = 0;
        $counted[$word]++;
    }
    return $counted;
}
