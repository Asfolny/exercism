<?php declare(strict_types=1);

function diamond(string $letter): array
{
    if (strlen($letter) !== 1)
        throw new InvalidArgumentException("diamond can only be produced by singular letter");
    // Ensure $letter is uppercase
    $letter = strtoupper($letter);
    if ($letter === "A") {
        // no iteration
        return [$letter];
    }

    $width = ord($letter) - 65;
    if ($width < 0 || $width > 25)
        throw new InvalidArgumentException("diamond can only be produced by singular letter");

    $r = [];
    for ($i = 0; $i < $width; $i++) {
        $mid = $i;
        $side = $width - $i;

        if ($i > 1) {
            $mid = $i * 2 - 1;
        }

        $str = str_repeat(" ", $side);
        if ($i === 0) {
            $str .= chr($i + 65);
        } else {
            $str .= chr($i + 65);
            $str .= str_repeat(" ", $mid);
            $str .= chr($i + 65);
        }
        $str .= str_repeat(" ", $side);
        $r[] = $str;
    }

    // Middle
    $r[] = $letter . str_repeat(" ", $width * 2 - 1) . $letter;

    for ($i = $width-1; $i >= 0; $i--) {
        $mid = $i;
        $side = $width - $i;

        if ($i > 1) {
            $mid = $i * 2 - 1;
        }

        $str = str_repeat(" ", $side);
        if ($i === 0) {
            $str .= chr($i + 65);
        } else {
            $str .= chr($i + 65);
            $str .= str_repeat(" ", $mid);
            $str .= chr($i + 65);
        }
        $str .= str_repeat(" ", $side);
        $r[] = $str;
    }

    return $r;
}
