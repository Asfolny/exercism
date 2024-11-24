using System;
using System.Collections.Generic;

public static class ProteinTranslation
{
    public static string[] Proteins(string strand)
    {
        var proteins = new List<String>();

        for (int i = 0; i <= strand.Length-3; i += 3) {
            var codon = strand[i..(i+3)] switch {
                    "AUG" => "Methionine",
                    "UUU" or "UUC" => "Phenylalanine",
                    "UUA" or "UUG" => "Leucine",
                    "UCU" or "UCC" or "UCA" or "UCG" => "Serine",
                    "UAU" or "UAC" => "Tyrosine",
                    "UGU" or "UGC" => "Cysteine",
                    "UGG" => "Tryptophan",
                    "UAA" or "UAG" or "UGA" => "STOP",
                    _ => ""
            };

            if (codon == "STOP") {
                break;
            }

            if (codon != "") {
                proteins.Add(codon);
            }
        }

        return proteins.ToArray();
    }
}