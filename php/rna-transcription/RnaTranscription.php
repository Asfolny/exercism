<?php declare(strict_types=1);

function toRna(string $dna): string
{
    $rna = "";

    foreach (str_split($dna) as $nucleo) {
        $rna .= match ($nucleo) {
            'G' => 'C',
            'C' => 'G',
            'T' => 'A',
            'A' => 'U'
        };
    }

    return $rna;
}
