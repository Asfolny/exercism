<?php declare(strict_types=1);

function acronym(string $text): string
{
    $text = str_replace("-", " ", $text);
    $result = "";
    foreach(explode(" ", $text) as $word) {
        if ($word) {
            $result .= strtoupper($word[0]);
        }
    }

    return $result;
}
