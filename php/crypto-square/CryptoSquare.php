<?php declare(strict_types=1);

function crypto_square(string $plaintext): string
{
    $normalized = preg_replace('/[^a-zA-Z0-9]/', '', mb_strtolower($plaintext));
    if (strlen($normalized) < 3) return $normalized;

    $letters = mb_str_split($normalized);
    $col_count = (int)ceil(sqrt(count($letters)));
    $row_count = (int)ceil(count($letters) / $col_count);
    $out = [];

    for ($c = 0; $c < $col_count; $c++, $tmp = []) {
        for ($r = 0; $r < $row_count; $r++) {
            $tmp[] = $letters[$col_count * $r + $c] ?? ' ';
        }
        $out[] = implode('', $tmp);
    }

    return implode(' ', $out);
}