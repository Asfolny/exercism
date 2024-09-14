<?php declare(strict_types=1);

function isValid(string $number): bool
{
    $number = str_replace(' ', '', $number);
    if (strlen($number) < 2) {
        return false;
    }

    // It contains any non-numberic character
    if (preg_match('/[^0-9]/', $number)) {
        return false;
    }

    $numberArr = array_map('intval', str_split($number));
    $odds = [];
    for ($i = count($numberArr) - 2; $i > -1 ; $i -= 2) {
        $odds[$i] = $numberArr[$i];
    }

    foreach ($odds as $place => $int) {
        // For this algorithm both 0 and 9 are special cases, we just want the original value
        $numberArr[$place] = match((int)$int) {
            0 => 0,
            9 => 9,
            default => ($int * 2) % 9
        };
    }

    $sum = array_sum($numberArr);

    if ($sum % 10 === 0) {
        return true;
    }

    return false;
}
