<?php declare(strict_types=1);
function transpose(array $input): array
{
    if ($input === ['']) {
        return [''];
    }

    $longestLine = array_reduce(
        $input,
        static fn($r, $ln) => max($r, strlen($ln)),
        0
    );

    $output = [];
    for ($x = 0; $x < $longestLine; $x++) {
        $line = "";
        foreach ($input as $yValue) {
            $line .= $yValue[$x] ?? " ";
        }
        $output[] = $line;
    }

    $output[count($output) - 1] = rtrim($output[count($output) - 1]);
    return $output;
}