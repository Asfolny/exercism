<?php declare(strict_types=1);

class ProteinTranslation
{
    private function _getProtein(string $seq): string {
        switch($seq) {
            case "AUG":
                return "Methionine";
            case "UUU":
            case "UUC":
                return "Phenylalanine";
            case "UUA":
            case "UUG":
                return "Leucine";
            case "UCU":
            case "UCC":
            case "UCA":
            case "UCG":
                return "Serine";
            case "UAU":
            case "UAC":
                return "Tyrosine";
            case "UGU":
            case "UGC":
                return "Cysteine";
            case "UGG":
                return "Tryptophan";
            case "UAA":
            case "UAG":
            case "UGA":
                return "STOP";
            default:
                throw new InvalidArgumentException("Invalid codon");
        }
    }

    public function getProteins(string $sequence): array
    {
        $proteins = [];
        $chunkSeq = chunk_split($sequence, 3, " ");
        foreach(array_filter(explode(" ", $chunkSeq)) as $seq) {
            $protein = $this->_getProtein($seq);
            if ($protein === "STOP") {
                break;
            }

            $proteins[] = $protein;
        }

        return $proteins;
    }
}
