<?php declare(strict_types=1);

function encode(string $text): string
{
    $cipherKey = str_split("zyxwvutsrqponmlkjihgfedcba");
    $encoded = "";
    $boxSize = 5;
    $added = 0;
    foreach(str_split($text) as $char) {
        $char = strtolower($char);
        $ord = ord($char) - 97;
        if ($ord < 0 || $ord > 26) {
            if (is_numeric($char)) {
                $encoded .= $char;
                $added++;
            }
            continue;
        }

        if ($added == $boxSize) {
            $encoded .= " ";
            $added = 0;
        }

        $encoded .= $cipherKey[$ord];
        $added++;
    }

    return $encoded;
}
