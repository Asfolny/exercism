<?php declare(strict_types=1);

function encode(string $plainMessage, int $rails): string
{
    $encode = [];
    $plainArr = mb_str_split($plainMessage);
    while (!empty($plainArr)) {
        // Down
        for ($i = 0; $i < $rails; $i++) {
            $char = array_shift($plainArr);
            if (!isset($encode[$i])) $encode[$i] = "";
            $encode[$i] .= $char;
        }

        if ($rails > 2) {
            // Up
            // NOTE: the lowest char on the fence is placed by Down
            //       and the highest char on the fence will be placed by Down later
            // This is why this runs from rails-2 to 1
            for($i = $rails-2; $i > 0; $i--) {
                $char = array_shift($plainArr);
                $encode[$i] .= $char;
            }
        }
    }

    return implode("", $encode);
}

function decode(string $cipherMessage, int $rails): string
{
    $plaintext = '';

    $fence = [];
    $dir = null;
    $row = 0;
    $col = 0;

    for ($i = 0; $i < strlen($cipherMessage); $i++) {
        if ($row === 0) {
            $dir = true;
        }

        if ($row === $rails-1) {
            $dir = false;
        }

        $fence[$row][$col] = '*';
        $col++;

        $dir ? $row++ : $row--;
    }

    $index = 0;
    for ($i = 0; $i < $rails; $i++) {
        for ($j = 0; $j < strlen($cipherMessage); $j++) {
            if(isset($fence[$i][$j]) && $fence[$i][$j] === "*" && $index < strlen($cipherMessage)) {
                $fence[$i][$j] = $cipherMessage[$index];
                $index++;
            }
        }
    }

    $result = "";
    $row = 0;
    $col = 0;
    for ($i = 0; $i < strlen($cipherMessage); $i++) {
        if ($row === 0) {
            $dir = true;
        }
        if ($row === $rails-1) {
            $dir = false;
        }

        if ($fence[$row][$col] !== '*') {
            $result .= $fence[$row][$col];
            $col++;
        }

        $dir ? $row++ : $row--;
    }

    return $result;
}
