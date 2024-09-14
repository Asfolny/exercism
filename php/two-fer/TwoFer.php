<?php declare(strict_types=1);

function twoFer(string $name = ""): string
{
    if ($name === "") {
        $name = "you";
    }

    return "One for $name, one for me.";
}
