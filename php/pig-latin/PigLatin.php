<?php declare(strict_types=1);

function translate(string $text): string
{
    $encs = [];
    foreach(explode(" ", $text) as $part) {
        $vowels = ["a", "e", "i", "o", "u"];
        if (in_array($part[0], $vowels) || in_array(substr($part, 0, 2), ["xr", "yt", "ay"])) {
            $encs[] = "{$part}ay";
            continue;
        }
        
        for ($i = 0; $i < strlen($part)-1; $i++) {
            if (substr($part, $i, 2) === "qu") {
                $part = substr($part, $i+2) . substr($part, 0, $i+2);
                break;
            }
    
            if (in_array($part[$i+1], $vowels) || $part[$i+1] === 'y') {
                $part = substr($part, $i+1) . substr($part, 0, $i+1);
                break;
            }
        }

        $encs[] = $part . "ay";
    }

    return implode(" ", $encs);
}
