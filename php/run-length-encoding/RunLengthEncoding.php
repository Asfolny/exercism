<?php declare(strict_types=1);

function encode(string $input): string
{
    $encoded = "";
    $lastChar = "";
    $seenCounter = 1;

    foreach(mb_str_split($input) as $char) {
        if ($char === $lastChar) {
            $seenCounter++;
            continue;
        }
        
        if ($seenCounter > 1) {
            $encoded .= "{$seenCounter}{$lastChar}";
        } else {
            $encoded .= "$lastChar";
        }
        $lastChar = $char;
        $seenCounter = 1;
    }

    // One extra run to get the last character in there
    if ($seenCounter > 1) {
        $encoded .= "{$seenCounter}{$lastChar}";
    } else {
        $encoded .= "$lastChar";
    }

    return $encoded;
}

function decode(string $input): string
{
    $decoded = "";
    $encounter = 0;
    foreach(mb_str_split($input) as $something) {
        if (is_numeric($something)) {
            $encounter *= 10; // Shift current 1 decimal left
            $encounter += (int)$something; // Add the current number
            continue;
        }

        if ($encounter === 0) {
            $decoded .= $something;
            continue;
        }

        $decoded .= str_repeat($something, $encounter);
        $encounter = 0;
    }

    return $decoded;
}
