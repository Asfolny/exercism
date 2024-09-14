<?php declare(strict_types=1);

function maskify(string $cc): string
{
    $masked = "";
    $numCount = 0;
    $numsInCc = preg_match_all("/[0-9]/", $cc);

    foreach(mb_str_split($cc) as $char) {
        if (ctype_digit($char)) {
            $numCount++;
            // Not the first, nor the last 4 characters should be masked
            if ($numCount > 1 && $numCount < $numsInCc - 3) {
                $masked .= "#";
                continue;
            }
        }

        $masked .= $char;
    }

    return $masked;
}
