<?php declare(strict_types=1);

function brackets_match(string $input): bool
{
    $brackCount = 0;
    $braceCount = 0;
    $parenCount = 0;
    $last = [];
    foreach (mb_str_split($input) as $char) {
        switch($char) {
            case "[":
                $brackCount++;
                $last[] = "[";
                break;
            case "{":
                $braceCount++;
                $last[] = "{";
                break;
            case "(":
                $parenCount++;
                $last[] = "(";
                break;
             case "]":
                $brackCount--;
                if (array_pop($last) !== "[") {
                    return false; // Bad closing order
                }
                break;
            case "}":
                $braceCount--;
                if (array_pop($last) !== "{") {
                    return false; // Bad closing order
                }
                break;
            case ")":
                $parenCount--;
                if (array_pop($last) !== "(") {
                    return false; // Bad closing order
                }
                break;
        }
    }

    return $brackCount === 0 && $braceCount === 0 && $parenCount === 0;
}
