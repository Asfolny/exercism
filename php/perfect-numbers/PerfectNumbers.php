<?php declare(strict_types=1);

function getClassification(int $number): string
{
    if ($number < 1)
        throw new InvalidArgumentException("cannot classify $number");
    if ($number === 1)
        return "deficient"; // 1 cannot be divided itself
    // Everything is divisible by 1
    $aliquot = 1;
    for($i = 2; $i <= (int)ceil($number/2); $i++) {
        if ($number % $i === 0) {
            $aliquot += $i;
        }
    }

    if ($aliquot === $number) {
        return "perfect";
    }

    return $aliquot > $number ? "abundant" : "deficient";
}
