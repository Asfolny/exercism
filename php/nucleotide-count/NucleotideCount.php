<?php declare(strict_types=1);

enum Nucleotide: string
{
    case ADENINE = "a";
    case CYTOSINE = "c";
    case GUANINE = "g";
    case THYMINE = "t";
}

function NucleotideCount(string $input): array
{
    $input = strtolower($input);
    $counted = [
        Nucleotide::ADENINE->value => 0,
        Nucleotide::CYTOSINE->value => 0,
        Nucleotide::THYMINE->value => 0,
        Nucleotide::GUANINE->value => 0,
    ];
    foreach(mb_str_split($input) as $nucleo) {
        $ide = Nucleotide::tryFrom($nucleo);
        var_dump($ide->value);
        switch ($ide) {
            case Nucleotide::ADENINE:
            case Nucleotide::CYTOSINE:
            case Nucleotide::GUANINE:
            case Nucleotide::THYMINE:
                $counted[$ide->value]++;
                break;
            default:
                throw new Exception("invalid Nucleotide");
        }
    }

    return $counted;
}
