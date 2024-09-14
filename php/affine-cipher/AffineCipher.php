<?php declare(strict_types=1);

function testMMI(int $num1) 
{
    for ($i = 0; $i < 26; $i++)
        if (($num1 * $i) % 26 == 1)
            return $i;
    throw new \Exception();
}

function encode(string $text, int $num1, int $num2): string
{
    testMMI($num1);

    $text = str_split(preg_replace('/[^\w]/', '', strtolower($text)));
    foreach ($text as &$let)
        if (!preg_match('/\d/', $let))
            $let = chr(ord('a') + ($num1 * (ord($let) - ord('a')) + $num2) % 26);

    if (count($text) > 5)
        return implode(' ', str_split(implode($text), 5));
    return implode($text);
}

function decode(string $text, int $num1, int $num2): string
{
    $num1 = testMMI($num1);

    $text = str_split(str_replace(' ', '', strtoupper($text)));
    foreach ($text as &$let)
        if (!preg_match('/\d/', $let))
            $let = chr(ord('A') + ($num1 * ((ord($let) + ord('A')) - $num2)) % 26);

    return strtolower(implode($text));
}