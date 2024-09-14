<?php declare(strict_types=1);

function smallest(int $min, int $max): array
{

    $palinDrome = checkPalinDrome($min, $max, true);
    $key = array_key_first($palinDrome);
    return [$key, $palinDrome[$key]];
}

function largest(int $min, int $max): array
{
    $palinDrome = checkPalinDrome($min, $max, true);
    $key = array_key_last($palinDrome);
    return [$key, $palinDrome[$key]];
}


function checkPalinDrome(int $min, int $max, $largest = false): array
{
    $setProduct = $max * $max;
    if ($largest) {
        $setProduct = $min * $min;
    }

    $palinDromes = [];
    for ($i = $min; $i <= $max; $i++) {
        for ($j = $i; $j <= $max; $j++) {
            $product = $i * $j;

             if ($largest === true && $product < $setProduct || $largest === false && $product > $setProduct) {
                continue;
            }

            if (isPalinDrome($product)) {
                $setProduct = $product;
                $palinDromes[$product] = $palinDromes[$product] ?? [];
                $palinDromes[$product][] = [$i, $j];
            }
        }
    }

    if (sizeof($palinDromes) === 0) {
        throw new Exception();
    }

    ksort($palinDromes);

    return $palinDromes;
}

function isPalinDrome(int $number): bool
{
    $chars = str_split((string)$number);
    return $chars === array_reverse($chars);
}